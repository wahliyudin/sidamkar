<?php

namespace App\Traits\AuthBackend;

use App\Http\Requests\RegisterRequest;
use App\Jobs\SendVerifEmailToUser;
use App\Models\NomenKlaturPerangkatDaerah;
use App\Models\Provinsi;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // dd(ucwords('sdhsdh sdjhsdkh wah'));
        $provinsis = Provinsi::query()->get(['id', 'nama']);
        $nomenklaturs = NomenKlaturPerangkatDaerah::query()->get(['id', 'nama']);
        $rolesUmum = Role::query()->whereNotIn('name', array_merge(getAllRoleFungsional(), getAllRoleStruktural(), getAllRoleProvKabKota(), ['kemendagri']))->get();
        return view('auth.register', compact('provinsis', 'nomenklaturs', 'rolesUmum'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        // $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        // event(new Registered($user));
        SendVerifEmailToUser::dispatch($user);

        // $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if (!is_null(Auth::user())) {
            Auth::logout();
        }
        return to_route('login')->with('message', 'Silahkan cek email kamu');
    }
}
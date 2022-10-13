<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserAparatur;
use App\Rules\PejabatStrukturalRule;
use App\Services\RegisterService;
use App\Traits\AuthBackend\RegistersUsers;
use Carbon\Carbon;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private RegisterService $registerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kab_kota_id' => ['required'],
            'jabatan' => ['required'],
            'file_ttd' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'file' => [new PejabatStrukturalRule()]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return $this->registerService->store($data);
    }
}

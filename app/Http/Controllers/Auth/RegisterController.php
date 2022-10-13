<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserAparatur;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'kab_kota_id' => ['required']
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
        $user = [
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'kab_kota_id' => $data['kab_kota_id']
        ];
        if (isset($data['jabatan']) == 'damkar') {
            $user = User::create($user);
            $user->attachRole('damkar');
            $user->userAparatur()->create([
                'nama'                  => $data['nama'],
                'jenjang'               => $data['jenjang'],
                'nip'                   => $data['nip'],
                'pangkat_golongan_tmt'  => $data['pangkat_golongan_tmt'],
                'tempat_lahir'          => $data['tempat_lahir'],
                'tanggal_lahir'         => Carbon::createFromFormat('Y-m-d', $data['tanggal_lahir'])->format('Y-m-d'),
                'jenis_kelamin'         => $data['jenis_kelamin'],
                'pendidikan_terakhir'   => $data['pendidikan_terakhir'],
                'nomor_karpeg'   => $data['nomor_karpeg'],
            ]);
            return $user;
        }
        if (isset($data['jabatan']) == 'analis_kebakaran') {
            $user = User::create($user);
            $user->attachRole('analis_kebakaran');
            $user->userAparatur()->create([
                'nama' => $data['nama'],
                'jenjang' => $data['jenjang'],
                'nip' => $data['nip'],
                'pangkat_golongan_tmt' => $data['pangkat_golongan_tmt'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => Carbon::createFromFormat('Y-m-d', $data['tanggal_lahir'])->format('Y-m-d'),
                'jenis_kelamin' => $data['jenis_kelamin'],
                'pendidikan_terakhir' => $data['pendidikan_terakhir'],
                'nomor_karpeg' => $data['nomor_karpeg'],
            ]);
            return $user;
        }
    }
}

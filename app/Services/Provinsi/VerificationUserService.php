<?php

namespace App\Services\Provinsi;

use App\Jobs\SendRejectToUser;
use App\Jobs\SendVerifToUser;
use App\Models\KabProvPenilaiAndPenetap;
use App\Models\User;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\KabProvPenilaiAndPenetapRepository;
use App\Repositories\UserRepository;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VerificationUserService
{
    use AuthTrait;

    protected UserRepository $userRepository;
    protected KabProvPenilaiAndPenetapRepository $kabProvPenilaiAndPenetapRepository;

    public function __construct(UserRepository $userRepository, KabProvPenilaiAndPenetapRepository $kabProvPenilaiAndPenetapRepository)
    {
        $this->userRepository = $userRepository;
        $this->kabProvPenilaiAndPenetapRepository = $kabProvPenilaiAndPenetapRepository;
    }

    public function verificationStruktural(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $provinsi_id = $this->authUser()->load('userProvKabKota')?->userProvKabKota->provinsi_id;
        $kabProvPenilaiAndPenetap = $this->kabProvPenilaiAndPenetapRepository->getPenilaiAndPenetapByProvinsi($provinsi_id);
        dd($kabProvPenilaiAndPenetap);
        if (isset($kabProvPenilaiAndPenetap)) {
            foreach ($request->jabatans as $jabatan) {
                if ($jabatan == 'penilai_ak_damkar' && isset($kabProvPenilaiAndPenetap->penilai_ak_damkar_id)) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak damkar']);
                }
                if ($jabatan == 'penilai_ak_analis' && isset($kabProvPenilaiAndPenetap->penilai_ak_analis_id)) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak analis']);
                }
                if ($jabatan == 'penetap_ak_damkar' && isset($kabProvPenilaiAndPenetap->penetap_ak_damkar_id)) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penetap ak damkar']);
                }
                if ($jabatan == 'penetap_ak_analis' && isset($kabProvPenilaiAndPenetap->penetap_ak_analis_id)) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penetap ak analis']);
                }
            }
        }
        foreach ($request->jabatans as $jabatan) {
            if ($jabatan == 'penilai_ak_damkar') {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ], [
                    'penilai_ak_damkar_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ]);
            }
            if ($jabatan == 'penilai_ak_analis') {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ], [
                    'penilai_ak_analis_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ]);
            }
            if ($jabatan == 'penetap_ak_damkar') {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ], [
                    'penetap_ak_damkar_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ]);
            }
            if ($jabatan == 'penetap_ak_analis') {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ], [
                    'penetap_ak_analis_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                    'tingkat_aparatur' => 'kab_kota'
                ]);
            }
        }
        $user->attachRoles($request->jabatans);
        $this->userRepository->updateStatusAkunVerified($user);
        SendVerifToUser::dispatch($user);
    }

    public function verification($id)
    {
        $user = User::query()->findOrFail($id);
        $user->update(['status_akun' => 1]);
        SendVerifToUser::dispatch($user);
    }

    public function reject(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $this->userRepository->updateStatusAkunReject($user);
        SendRejectToUser::dispatch($user, $request->catatan);
    }

    public function destructJabatans(array $jabatans)
    {
        $results = [];
        $jenis_aparaturs = [];
        foreach ($jabatans as $jabatan) {
            if (str($jabatan)->contains('penilai_ak_damkar')) {
                array_push($results, 'penilai_ak');
                array_push($jenis_aparaturs, 'damkar');
            }
            if (str($jabatan)->contains('penilai_ak_analis')) {
                array_push($results, 'penilai_ak');
                array_push($jenis_aparaturs, 'analis');
            }
            if (str($jabatan)->contains('penetap_ak_damkar')) {
                array_push($results, 'penetap_ak');
                array_push($jenis_aparaturs, 'damkar');
            }
            if (str($jabatan)->contains('penetap_ak_analis')) {
                array_push($results, 'penetap_ak');
                array_push($jenis_aparaturs, 'analis');
            }
            if (str($jabatan)->contains('atasan_langsung')) {
                array_push($results, 'atasan_langsung');
            }
        }
        return [
            $results,
            $jenis_aparaturs
        ];
    }
}

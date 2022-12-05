<?php

namespace App\Services\KabKota;

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
        [$jabatans, $jenis_aparaturs] = $this->destructJabatans($request->jabatans);
        $user = $this->userRepository->getUserById($id);
        $atasan = null;
        $penilaiPenetap = [];
        $kab_kota_id = $this->authUser()->load('userProvKabKota')?->userProvKabKota->kab_kota_id;
        for ($i=0; $i < count($jabatans); $i++) {
            if ($jabatans[$i] == 'atasan_langsung') $atasan = $jabatans[$i];
            for ($j=0; $j < count($jenis_aparaturs); $j++) {
                if (in_array($jabatans[$i], ['penilai_ak', 'penetap_ak'])) array_push($penilaiPenetap, ['jabatan'=>$jabatans[$i], 'jenis_aparatur' => $jenis_aparaturs[$j]]);
                if (in_array($jabatans[$i], ['penilai_ak'])) {
                    $isExist = $this->kabProvPenilaiAndPenetapRepository->checkPenilaiAngkaKreditByKabKota($kab_kota_id, $jenis_aparaturs[$j]);
                    if ($isExist) throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak']);
                }
                if (in_array($jabatans[$i], ['penetap_ak'])) {
                    $isExist = $this->kabProvPenilaiAndPenetapRepository->checkPenetapAngkaKreditByKabKota($kab_kota_id, $jenis_aparaturs[$j]);
                    if ($isExist) throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penetap ak']);
                }
            }
        }
        $roles = [];
        for ($i=0; $i < count($penilaiPenetap); $i++) {
            array_push($roles, $penilaiPenetap[$i]['jabatan']);
            if (in_array($penilaiPenetap[$i]['jabatan'], ['penilai_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $kab_kota_id,
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur']
                ], [
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur'],
                    'penilai_ak_id' => $user->id,
                    'kab_kota_id' => $kab_kota_id,
                ]);
            }
            if (in_array($penilaiPenetap[$i]['jabatan'], ['penetap_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $kab_kota_id,
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur']
                ], [
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur'],
                    'penetap_ak_id' => $user->id,
                    'kab_kota_id' => $kab_kota_id,
                ]);
            }
        }
        array_push($roles, $atasan);
        $user->attachRoles(array_unique($roles));
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
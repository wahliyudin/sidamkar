<?php

namespace App\Services\Provinsi;

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
        $provinsi_id = $this->authUser()->load('userProvKabKota')?->userProvKabKota->provinsi_id;
        for ($i=0; $i < count($jabatans); $i++) {
            if ($jabatans[$i] == 'atasan_langsung') $atasan = $jabatans[$i];
            for ($j=0; $j < count($jenis_aparaturs); $j++) {
                if (in_array($jabatans[$i], ['penilai_ak', 'penetap_ak'])) array_push($penilaiPenetap, ['jabatan'=>$jabatans[$i], 'jenis_aparatur' => $jenis_aparaturs[$j]]);
                if (in_array($jabatans[$i], ['penilai_ak'])) {
                    $isExist = $this->kabProvPenilaiAndPenetapRepository->checkPenilaiAngkaKreditByProvinsi($provinsi_id, $jenis_aparaturs[$j]);
                    if ($isExist) throw ValidationException::withMessages(['message' => 'Maaf Provinsi sudah mempunyai penilai ak']);
                }
                if (in_array($jabatans[$i], ['penetap_ak'])) {
                    $isExist = $this->kabProvPenilaiAndPenetapRepository->checkPenetapAngkaKreditByProvinsi($provinsi_id, $jenis_aparaturs[$j]);
                    if ($isExist) throw ValidationException::withMessages(['message' => 'Maaf Provinsi sudah mempunyai penetap ak']);
                }
            }
        }
        $roles = [];
        for ($i=0; $i < count($penilaiPenetap); $i++) {
            array_push($roles, $penilaiPenetap[$i]['jabatan']);
            if (in_array($penilaiPenetap[$i]['jabatan'], ['penilai_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur']
                ], [
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur'],
                    'penilai_ak_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                ]);
            }
            if (in_array($penilaiPenetap[$i]['jabatan'], ['penetap_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'provinsi_id' => $provinsi_id,
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur']
                ], [
                    'jenis_aparatur' => $penilaiPenetap[$i]['jenis_aparatur'],
                    'penetap_ak_id' => $user->id,
                    'provinsi_id' => $provinsi_id,
                ]);
            }
        }
        array_push($roles, $atasan);
        $user->attachRoles(array_unique($roles));
        $this->userRepository->updateStatusAkunVerified($user);
        // $user->notify(new UserVerified());
    }

    public function verification($id)
    {
        $user = User::query()->findOrFail($id);
        $user->update(['status_akun' => 1]);
        $user->notify(new UserVerified());
    }

    public function reject(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $this->userRepository->updateStatusAkunReject($user);
        $user->notify(new UserReject($request->catatan));
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
        }
        return [
            $results,
            $jenis_aparaturs
        ];
    }
}
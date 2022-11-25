<?php

namespace App\Services;

use App\Models\KabProvPenilaiAndPenetap;
use App\Models\User;
use App\Notifications\UserReject;
use App\Notifications\UserVerified;
use App\Repositories\UserRepository;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VerificationUserService
{
    use AuthTrait;

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function verificationStruktural(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $atasan = null;
        $penilaiPenetap = [];
        $kab_kota_id = $this->authUser()->load('userProvKabKota')?->userProvKabKota->kab_kota_id;
        foreach ($request->jabatans as $jabatan) {
            if ($jabatan == 'atasan_langsung') $atasan = $jabatan;
            if (in_array($jabatan, ['penilai_ak', 'penetap_ak'])) array_push($penilaiPenetap, $jabatan);
            if (in_array($jabatan, ['penilai_ak'])) {
                $users = User::query()->with(['userPejabatStruktural' => function ($query) use ($kab_kota_id) {
                    $query->where('kab_kota_id', $kab_kota_id)
                        ->where('tingkat_aparatur', 'kab_kota');
                }])
                    ->where('status_akun', User::STATUS_ACTIVE)
                    ->whereRoleIs(['penilai_ak'])->get();
                if (count($users) > 0) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak']);
                }
            }
            if (in_array($jabatan, ['penetap_ak'])) {
                $users = User::query()->with(['userPejabatStruktural' => function ($query) use ($kab_kota_id) {
                    $query->where('kab_kota_id', $kab_kota_id)
                        ->where('tingkat_aparatur', 'kab_kota');
                }])
                    ->where('status_akun', User::STATUS_ACTIVE)
                    ->whereRoleIs(['penetap_ak'])->get();
                if (count($users) > 0) {
                    throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak']);
                }
            }
        }
        array_push($penilaiPenetap, $atasan);
        $user->attachRoles($penilaiPenetap);
        $this->userRepository->updateStatusAkunVerified($user);
        foreach ($penilaiPenetap as $peniPene) {
            if (in_array($peniPene, ['penilai_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $kab_kota_id,
                ], [
                    'penilai_ak_id' => $user->id,
                    'kab_kota_id' => $kab_kota_id,
                ]);
            }
            if (in_array($peniPene, ['penetap_ak'])) {
                KabProvPenilaiAndPenetap::query()->updateOrCreate([
                    'kab_kota_id' => $kab_kota_id,
                ], [
                    'penetap_ak_id' => $user->id,
                    'kab_kota_id' => $kab_kota_id,
                ]);
            }
        }
        $user->notify(new UserVerified());
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
}
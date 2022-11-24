<?php

namespace App\Services;

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

    public function verification(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $atasan = null;
        $penilaiPenetap = [];
        foreach ($request->jabatans as $jabatan) {
            if ($jabatan == 'atasan_langsung') $atasan = $jabatan;
            if (in_array($jabatan, ['penilai_ak', 'penetap_ak'])) array_push($penilaiPenetap, $jabatan);
        }
        if (count($penilaiPenetap) > 0) {
            $users = User::query()->with(['userPejabatStruktural' => function($query){
                $query->where('kab_kota_id', $this->authUser()->load('userProvKabKota')?->userProvKabKota->kab_kota_id);
            }])->whereRoleIs(['penilai_ak', 'penetap_ak'])->get();
            if (count($users) > 0) {
                throw ValidationException::withMessages(['message' => 'Maaf Kabupaten Kota sudah mempunyai penilai ak dan penetap ak']);
            }
        }
        array_push($penilaiPenetap, $atasan);
        $user->attachRoles($penilaiPenetap);
        $this->userRepository->updateStatusAkunVerified($user);
        $user->notify(new UserVerified());
    }

    public function reject(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);
        $this->userRepository->updateStatusAkunReject($user);
        $user->notify(new UserReject($request->catatan));
    }
}
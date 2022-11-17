<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Repositories\RegisterRepository;
use App\Traits\ImageTrait;
use Exception;

class RegisterService
{
    use ImageTrait;

    private RegisterRepository $registerRepository;

    /**
     * __construct
     *
     * @param  mixed $registerRepository
     * @return void
     */
    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return User
     */
    public function store(array $data): User
    {
        if (isset($data['jenis_jabatan'])) {
            if (in_array($data['jenis_jabatan'], ['kab_kota', 'provinsi'])) {
                $user = $this->storeProvKabKota($data);
                $user->attachRole($data['jenis_jabatan']);
                return $user;
            }
        }
        if (isset($data['jenis_aparatur'])) {
            if ($data['jenis_aparatur'] == 'fungsional') {
                if (in_array($data['jenis_jabatan'], getAllRoleFungsional())) {
                    $user = $this->storeAparatur($data);
                    $user->attachRole($data['jenis_jabatan']);
                    return $user;
                }
            } elseif ($data['jenis_aparatur'] == 'struktural') {
                return $this->storeStruktural($data);
            } elseif ($data['jenis_aparatur'] == 'fungsional_umum') {
                if ($data['jenis_jabatan_umum'] == 'lainnya') {
                    $role = Role::query()->create([
                        'name' => str($data['jenis_jabatan_text'])->snake(),
                        'display_name' => ucwords($data['jenis_jabatan_text']),
                        'description' => ''
                    ]);
                    $user = $this->storeAparatur($data);
                    $user->attachRole($role->name);
                } else {
                    $user = $this->storeAparatur($data);
                    $user->attachRole($data['jenis_jabatan_umum']);
                }
            }
        }
    }

    /**
     * storeAparatur
     *
     * @param  mixed $data
     * @return User
     */
    private function storeAparatur(array $data): User
    {
        $user = $this->registerRepository->storeUser($data);
        $this->registerRepository->storeAparatur($user, $data);
        return $user;
    }

    /**
     * storeStruktural
     *
     * @param  mixed $data
     * @return User
     */
    public function storeStruktural(array $data): User
    {
        $user = $this->registerRepository->storeUser($data);
        $this->registerRepository->storeStruktural($user, $data);
        return $user;
    }

    /**
     * storeProvKabKota
     *
     * @param  mixed $data
     * @return User
     */
    public function storeProvKabKota(array $data): User
    {
        $user = $this->registerRepository->storeUser($data);
        $this->registerRepository->storeProvKabKota($user, $data);
        return $user;
    }
}

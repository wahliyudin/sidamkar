<?php

namespace App\Services;

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
        if (!isset($data['jenis_jabatan'])) {
            throw new Exception("Jabatan tidak ada", 400);
        }
        if (in_array($data['jenis_jabatan'], getAllRoleFungsional())) {
            $user = $this->storeAparatur($data);
            $user->attachRole($data['jenis_jabatan']);
            return $user;
        }
        if (in_array($data['jenis_jabatan'], ['atasan_langsung', 'penilai_ak', 'penetap_ak'])) {
            $user = $this->storeStruktural($data);
            $user->attachRole($data['jenis_jabatan']);
            return $user;
        }
        if (in_array($data['jenis_jabatan'], ['kab_kota', 'provinsi'])) {
            $user = $this->storeProvKabKota($data);
            $user->attachRole($data['jenis_jabatan']);
            return $user;
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

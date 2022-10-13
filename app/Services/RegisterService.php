<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RegisterRepository;
use Exception;

class RegisterService
{
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
        if (!isset($data['jabatan'])) {
            throw new Exception("Jabatan tidak ada", 400);
        }
        switch ($data['jabatan']) {
            case 'damkar':
                $user = $this->storeAparatur($data);
                $user->attachRole('damkar');
                return $user;
                break;
            case 'analis_kebakaran':
                $user = $this->storeAparatur($data);
                $user->attachRole('analis_kebakaran');
                return $user;
                break;
            case 'atasan_langsung':
                $user = $this->storeStruktural($data);
                $user->attachRole('atasan_langsung');
                return $user;
                break;
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
        return $this->registerRepository->storeAparatur($user, $data);
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
        return $this->registerRepository->storeStruktural($user, $data);
    }
}

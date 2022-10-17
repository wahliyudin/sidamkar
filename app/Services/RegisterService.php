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
            case 'penilai_ak':
                $user = $this->storeStruktural($data);
                $user->attachRole('penilai_ak');
                return $user;
                break;
            case 'penetap_ak':
                $user = $this->storeStruktural($data);
                $user->attachRole('penetap_ak');
                return $user;
                break;
            case 'kab_kota':
                $user = $this->storeProvKabKota($data);
                $user->attachRole('kab_kota');
                return $user;
                break;
            case 'provinsi':
                $user = $this->storeProvKabKota($data);
                $user->attachRole('provinsi');
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
        $data = array_merge($data, [
            'file_ttd' => $this->storeImage($data['file_ttd'], 'struktural')
        ]);
        $user = $this->registerRepository->storeUser($data);
        $this->registerRepository->storeStruktural($user, $data);
        return $user;
    }

    public function storeProvKabKota(array $data): User
    {
        $data = array_merge($data, [
            'file_permohonan' => $this->storeFile($data['file_permohonan'], 'kabkota')
        ]);
        $user = $this->registerRepository->storeUser($data);
        $this->registerRepository->storeProvKabKota($user, $data);
        return $user;
    }
}

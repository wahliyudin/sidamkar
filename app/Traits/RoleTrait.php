<?php

namespace App\Traits;

/**
 *
 */
trait RoleTrait
{
    public function getPangkatByRole($role)
    {
        switch ($role) {
            case 'damkar_pemula':
                return $this->getPangkatPemula();
                break;
            case 'damkar_terampil':
                return $this->getPangkatTerampil();
                break;
            case 'damkar_mahir':
                return $this->getPangkatMahir();
                break;
            case 'damkar_penyelia':
                return $this->getPangkatPenyelia();
                break;
            case 'analis_kebakaran_ahli_pertama':
                return $this->getPangkatAhliPertama();
                break;
            case 'analis_kebakaran_ahli_muda':
                return $this->getPangkatAhliMuda();
                break;
            case 'analis_kebakaran_ahli_madya':
                return $this->getPangkatAhliMadya();
                break;
        }
    }

    private function getPangkatPemula(): array
    {
        return [
            'Pengatur Muda (II/a)'
        ];
    }

    private function getPangkatTerampil(): array
    {
        return [
            'Pengatur Muda Tingkat I (II/b)',
            'Pengatur (II/c)',
            'Pengatur Tingkat I (II/d)'
        ];
    }

    private function getPangkatMahir(): array
    {
        return [
            'Penata Muda (III/a)',
            'Penata Muda Tingkat I (III/b)'
        ];
    }

    private function getPangkatPenyelia(): array
    {
        return [
            'Penata (III/c)',
            'Penata Tingkat I (III/d)'
        ];
    }

    private function getPangkatAhliPertama(): array
    {
        return [
            'Penata Muda (III/a)',
            'Penata Muda Tingkat I (III/b)'
        ];
    }

    private function getPangkatAhliMuda(): array
    {
        return [
            'Penata (III/c)',
            'Penata Tingkat I (III/d)'
        ];
    }

    private function getPangkatAhliMadya(): array
    {
        return [
            'Pembina (IV/a)',
            'Pembina Tingkat I (IV/b)',
            'Pembina Muda (IV/c)'
        ];
    }

    public function getJenjangSelanjutnya($role_name)
    {
        switch ($role_name) {
            case 'damkar_pemula':
                return 'Damkar Terampil';
                break;
            case 'damkar_terampil':
                return 'Damkar Mahir';
                break;
            case 'damkar_mahir':
                return 'Damkar Penyelia';
                break;
            case 'damkar_penyelia':
                return 'Damkar Penyelia';
                break;
            case 'analis_kebakaran_ahli_pertama':
                return 'Analis Kebekaran Ahli Muda';
                break;
            case 'analis_kebakaran_ahli_muda':
                return 'Analis Kebekaran Ahli Madya';
                break;
            case 'analis_kebakaran_ahli_madya':
                return 'Analis Kebekaran Ahli Madya';
                break;
        }
    }

    public function getPangkatSelanjutnya($pangkat)
    {
        switch ($pangkat) {
            case 'Juru Muda (I/a)':
                return 'Juru Muda Tingkat I (I/b)';
                break;
            case 'Juru Muda Tingkat I (I/b)':
                return 'Juru (I/c)';
                break;
            case 'Juru (I/c)':
                return 'Juru Tingkat I (I/d)';
                break;
            case 'Juru Tingkat I (I/d)':
                return 'Pengatur Muda (II/a)';
                break;
            case 'Pengatur Muda (II/a)':
                return 'Pengatur Muda Tingkat I (II/b)';
                break;
            case 'Pengatur Muda Tingkat I (II/b)':
                return 'Pengatur (II/c)';
                break;
            case 'Pengatur (II/c)':
                return 'Pengatur Tingkat I (II/d)';
                break;
            case 'Pengatur Tingkat I (II/d)':
                return 'Penata Muda (III/a)';
                break;
            case 'Penata Muda (III/a)':
                return 'Penata Muda Tingkat I (III/b)';
                break;
            case 'Penata Muda Tingkat I (III/b)':
                return 'Penata (III/c)';
                break;
            case 'Penata Tingkat I (III/d)':
                return 'Pembina (IV/a)';
                break;
            case 'Pembina (IV/a)':
                return 'Pembina Tingkat I (IV/b)';
                break;
            case 'Pembina Tingkat I (IV/b)':
                return 'Pembina Muda (IV/c)';
                break;
            case 'Pembina Muda (IV/c)':
                return 'Pembina Madya (IV/d)';
                break;
            case 'Pembina Madya (IV/d)':
                return 'Pembina Utama (IV/e)';
                break;
        }
    }
}
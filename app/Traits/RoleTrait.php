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
}

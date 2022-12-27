<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('assets/css/main/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .center {
            text-align: center;
        }

        th,
        td {
            border-width: 1px !important;
            font-size: 13px;
        }

        .bd {
            border-width: 0 !important;
        }

        .table-light-none {
            --bs-table-bg: #f8f9fa;
            --bs-table-striped-bg: #ecedee;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #dfe0e1;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #e5e6e7;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: transparent;
        }

        .right {
            text-align: right;
            padding-right: 60px;
        }

        .page-break {
            page-break-inside: auto;
        }

        .table.table-light-none>:not(caption)>*>* {
            padding: .1rem .3rem;
        }
    </style>
</head>

<body>
    <table width="98%" class="table table-light-none table-striped page-break">
        <thead>
            <tr>
                <th class="bd center" style="font-size: 16px;" colspan="6">PENILAIAN CAPAIAN ANGKA KREDIT</th>
            </tr>
            <tr>
                <th class="bd center" style="font-size: 16px;" colspan="6">NOMOR : {{ $no_surat }}</th>
            </tr>
            <tr>
                <th class="bd" colspan="6"> <br></th>
            </tr>
        </thead>
    </table>
    <table width="98%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="center" colspan="6">
                    {{ $group_role == 'analis' ? 'ANALIS KEBAKARAN' : 'PEMADAM KEBAKARAN' }} YANG DINILAI</td>
            </tr>
            <tr>
                <td style="width: 150px;">Nama</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['user']?->userAparatur?->nama }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">NIP</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['user']?->userAparatur?->nip }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Nomor Seri Karpeg</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['user']?->userAparatur?->nomor_karpeg }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Tempat/Tgl Lahir</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['user']?->userAparatur->tempat_lahir . ', ' . \Carbon\Carbon::make($data['user']?->userAparatur->tanggal_lahir)->format('Y-m-d') }}
                </td>
            </tr>
            <tr>
                <td style="width: 150px;">Jenis Kelamin</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['user']?->userAparatur?->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Pangkat/Gol. Ruang/TMT</td>
                <td style="width: 10px;">:</td>
                <td>{{ ($data['user']?->userAparatur->golongan_custom ?? $data['user']?->userAparatur->pangkatGolonganTmt->nama) . ' / ' . $data['user']?->userAparatur->golongan_tmt }}
                </td>
            </tr>
            <tr>
                <td style="width: 150px;">Jabatan/TMT</td>
                <td style="width: 10px;">:</td>
                <td>{{ $data['role']?->display_name . ' / ' . $data['user']?->userAparatur->jabatan_tmt }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Unit Kerja</td>
                <td style="width: 10px;">:</td>
                <td>Lorem, ipsum. Lorem, ipsum.</td>
            </tr>
        </tbody>
    </table>
    <table width="98%" class="table table-light table-striped page-break">
        <tbody>
            <tr>
                <td class="center" colspan="6">HASIL PENILAIAN CAPAIAN ANGKA KREDIT</td>
            </tr>
            <tr>
                <th class="center" width="80px">TAHUN</th>
                <th class="center" width="115px">TARGET AK SKP</th>
                <th class="center" width="115px">NILAI CAPAIAN TUGAS JABATAN</th>
                <th class="center" width="115px">PERSENTASE</th>
                <th class="center" width="115px">AK MINIMAL PER TAHUN</th>
                <th class="center" width="115px">AK YANG DIDAPAT</th>
            </tr>
            <tr>
                <td class="center">{{ $data['periode'] }}</td>
                <td class="center">{{ $data['target_ak_skp'] }}</td>
                <td class="center">{{ $data['capaian'] }}</td>
                <td class="center">{{ $data['persentase'] }}</td>
                <td class="center">{{ $data['ak_min'] }}</td>
                <td class="center">{{ $data['total_ak'] }}</td>
            </tr>
            <tr>
                <th class="center" colspan="5">Jumlah Angka Kredit Yang Diperoleh Berdasarkan Capaian SKP</th>
                <th class="center">{{ $data['total_ak'] }}</th>
            </tr>
            <tr>
                <th class="center" colspan="5">Angka Kredit Maksimal</th>
                <th class="center">{{ $data['ak_max'] }}</th>
            </tr>
            <tr>
                <th class="center" colspan="5">Capaian Angka Kredit</th>
                <th class="center">{{ $data['result'] }}</th>
            </tr>
        </tbody>
    </table>
    <table width="98%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd center" colspan="6"><br></td>
            </tr>
            <tr>
                <td class="bd" colspan="4">Asli Penilaian Angka Kredit untuk:</td>
                <td class="bd" style="padding-left: 120px;" colspan="2">Ditetapkan di
                    {{ isset($penilai) ? ((isset($penilai->userPejabatStruktural->kabKota) ? $penilai->userPejabatStruktural->kabKota->nama : isset($penilai->userPejabatStruktural->provinsi)) ? $penilai->userPejabatStruktural->provinsi->nama : 'Pusat') : '' }}
                </td>
            </tr>
            <tr>
                <td class="bd" colspan="4">1. Pimpinan Instansi Pengusul; dan</td>
                <td class="bd" style="padding-left: 120px;" colspan="2">Pada tanggal
                    {{ isset($penilai) ? now()->translatedFormat('d F Y') : '' }}</td>
            </tr>
            <tr>
                <td class="bd" colspan="4">2. Pejabat Fungsional Yang Bersangkutan</td>
                <td class="bd" colspan="2"></td>
            </tr>
            <tr>
                <td class="bd" colspan="4"></td>
                <th class="bd" colspan="2">Ketua Tim Penilai,</th>
            </tr>
            <tr>
                <td class="bd" colspan="4">Tembusan disampaikan kepada:</td>
                <td class="bd" colspan="2" style="position: relative;">
                    @if (isset($penilai))
                        <img src="{{ linkToBasePath($penilai?->userPejabatStruktural?->file_ttd) }}"
                            style="width: 100px; max-height: 100px; position: absolute; right: 35%; top: 10px; object-fit: contain;"
                            alt="">
                    @endif
                </td>
            </tr>
            <tr>
                <td class="bd" colspan="4">1. Pejabat yang berwenang menetapkan Angka Kredit:</td>
                <td class="bd" colspan="2"></td>
            </tr>
            <tr>
                <td class="bd" colspan="4">2. Sekretaris Tim Penilai yang bersangkutan: dan</td>
                <td class="bd" colspan="2"></td>
            </tr>
            <tr>
                <td class="bd" colspan="4">3. Bagian yang membidangi kepegawaian yang bersangkutan</td>
                <td class="bd" colspan="2" style="text-decoration: underline;">
                    {{-- @if (isset($penilai))
                        <img src="{{ linkToBasePath($penilai?->userPejabatStruktural?->file_ttd) }}"
                            style="width: 150px;" alt="">
                    @endif --}}
                </td>
            </tr>
            <tr>
                <td class="bd" colspan="4"></td>
                <th class="bd" colspan="2">
                    {{ isset($penilai) ? $penilai?->userPejabatStruktural?->nama : '-' }} <br>
                    NIP : {{ isset($penilai) ? $penilai?->userPejabatStruktural?->nip : '-' }}
                </th>
            </tr>
        </tbody>
    </table>
</body>

</html>

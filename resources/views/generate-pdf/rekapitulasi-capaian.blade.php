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
    <table width="99%" class="table table-light-none table-striped page-break">
        <thead>
            <tr>
                <th class="bd center letter" colspan="7" style="font-size: 16px">REKAPITULASI CAPAIAN ANGKA KREDIT
                </th>
            </tr>
            <tr>
                <th class="bd center letter" colspan="7" style="font-size: 14px; text-transform: uppercase;">JABATAN
                    FUNGSIONAL
                    {{ $user?->roles()?->first()->display_name }}</th>
            </tr>
            <tr>
                <th colspan="7" class="bd"><br></th>
            </tr>
        </thead>
    </table>
    <table width="99%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <th colspan="7" style="text-align: start;" class="letter">Periode Penilaian:
                    {{ Carbon\Carbon::make($periode->awal)->translatedFormat('F Y') . ' - ' . Carbon\Carbon::make($periode->akhir)->translatedFormat('F Y') }}
                </th>
            </tr>
        </tbody>
    </table>
    <table width="99%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <th class="center letter" style="padding-bottom: 10px;" colspan="3" width="350">PEJABAT YANG
                    DINILAI</th>
                <th class="center letter" style="padding-bottom: 10px;" colspan="4" width="350">ATASAN LANGSUNG
                </th>
            </tr>
            <tr>
                <td width="70px">Nama</td>
                <td width="5px">:</td>
                <td width="200px">{{ $user?->userAparatur?->nama }}</td>
                <td width="70px">Nama</td>
                <td width="5px">:</td>
                <td width="200px">{{ $atasan_langsung?->userPejabatStruktural?->nama }}</td>
            </tr>
            <tr>
                <td width="70px">NIP</td>
                <td width="5px">:</td>
                <td width="200px">{{ $user?->userAparatur?->nip }}</td>
                <td width="70px">NIP</td>
                <td width="5px">:</td>
                <td width="200px">{{ $atasan_langsung?->userPejabatStruktural?->nip }}</td>
            </tr>
            <tr>
                <td width="70px">Pangkat/Gol Ruang</td>
                <td width="5px">:</td>
                <td width="200px">
                    {{ $user?->userAparatur?->pangkatGolonganTmt?->nama ?? $user->userAparatur->golongan_custom }}</td>
                <td width="70px">Pangkat/Gol Ruang</td>
                <td width="5px">:</td>
                <td width="200px">{{ $atasan_langsung?->userPejabatStruktural?->pangkatGolonganTmt?->nama }}</td>
            </tr>
            <tr>
                <td width="70px">Jabatan</td>
                <td width="5px">:</td>
                <td width="200px">{{ $user?->roles()?->first()?->display_name }}</td>
                <td width="70px">Jabatan</td>
                <td width="5px">:</td>
                <td width="200px">{{ $role_atasan_langsung?->display_name }}</td>
            </tr>
            <tr>
                <td width="70px" style="padding-bottom: 10px;">Unit Kerja</td>
                <td width="5px">:</td>
                <td width="200px">{{ $user?->userAparatur?->nomenklaturPerangkatDaerah?->nama }}</td>
                <td width="70px" style="padding-bottom: 10px;">Unit Kerja</td>
                <td width="5px">:</td>
                <td width="200px">{{ $atasan_langsung?->userPejabatStruktural?->nomenklaturPerangkatDaerah?->nama }}
                </td>
            </tr>
        </tbody>
    </table>
    <table width="99%" class="table table-striped page-break">
        <tbody>
            <tr>
                <th class="center" width="25px">NO</th>
                <th class="center" width="125px">RENCANA KINERJA</th>
                <th class="center">BUTIR KEGIATAN YANG TERKAIT</th>
                <th class="center">OUTPUT</th>
                <th class="center">AK</th>
                <th class="center">VOLUME</th>
                <th class="center">JUMLAH AK</th>
            </tr>
            @foreach ($rencanas as $rencana)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rencana['rencana'] }}</td>
                    <td>1.1. Kegiatan sesuai jenjang jabatan</td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
                @foreach ($rencana['rencanas'] as $item)
                    @if ($item['tingkat_role'] == 'sesuai_jenjang')
                        <tr>
                            <td><br></td>
                            <td><br></td>
                            <td>{{ $item['butir_kegiatan_nama'] }}</td>
                            <td>{{ $item['satuan_hasil'] }}</td>
                            <td style="text-align: center;">{{ $item['score'] }}</td>
                            <td style="text-align: center;">{{ $item['volume'] }}</td>
                            <td style="text-align: center;">{{ $item['jumlah_ak'] }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>1.2. Kegiatan pada 1 jenjang di bawahnya</td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
                @foreach ($rencana['rencanas'] as $item)
                    @if ($item['tingkat_role'] == 'jenjang_bawah')
                        <tr>
                            <td><br></td>
                            <td><br></td>
                            <td>{{ $item['butir_kegiatan_nama'] }}</td>
                            <td>{{ $item['satuan_hasil'] }}</td>
                            <td style="text-align: center;">{{ $item['score'] }}</td>
                            <td style="text-align: center;">{{ $item['volume'] }}</td>
                            <td style="text-align: center;">{{ $item['jumlah_ak'] }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>1.3. Kegiatan pada 1 jenjang di atasnya</td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                    <td><br></td>
                </tr>
                @foreach ($rencana['rencanas'] as $item)
                    @if ($item['tingkat_role'] == 'jenjang_atas')
                        <tr>
                            <td><br></td>
                            <td><br></td>
                            <td>{{ $item['butir_kegiatan_nama'] }}</td>
                            <td>{{ $item['satuan_hasil'] }}</td>
                            <td style="text-align: center;">{{ $item['score'] }}</td>
                            <td style="text-align: center;">{{ $item['volume'] }}</td>
                            <td style="text-align: center;">{{ $item['jumlah_ak'] }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            <tr>
                <th class="center" colspan="6">TOTAL CAPAIAN ANGKA KREDIT</th>
                <th>{{ $total_capaian }}</th>
            </tr>
        </tbody>
    </table>
    <table width="99%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd" colspan="7"><br></td>
            </tr>
            <tr>
                <th class="bd center letter" colspan="3" width="350px">ATASAN LANSGUNG
                <th class="bd center letter" colspan="4" width="350px">PEJABAT YANG DINILAI</th>
            </tr>
            <tr>
                <td class="bd center letter" colspan="3" height="100px">
                    @if ($is_ttd_atasan == true)
                        <img src="{{ linkToBasePath($atasan_langsung->userPejabatStruktural->file_ttd) }}"
                            style="width: 150px;" alt="">
                    @endif
                </td>
                <td class="bd center letter" colspan="4" height="100px">
                    @if ($is_ttd_aparatur == true)
                        <img src="{{ linkToBasePath($user->userAparatur->file_ttd) }}" style="width: 150px;"
                            alt="">
                    @endif
                </td>
            </tr>
            <tr>
                <th class="bd center letter" colspan="3" width="350px" style="text-decoration: underline;">
                    @if ($is_ttd_atasan == true)
                        {{ $atasan_langsung->userPejabatStruktural->nama }}
                    @endif
                </th>
                <th class="bd center letter" colspan="4" width="350px" style="text-decoration: underline;">
                    @if ($is_ttd_aparatur == true)
                        {{ $user->userAparatur->nama }}
                    @endif
                </th>
            </tr>
        </tbody>
    </table>
</body>

</html>

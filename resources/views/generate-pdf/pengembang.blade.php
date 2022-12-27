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
        <tbody>
            <tr>
                <th class="center" colspan="6">PENILAIAN ANGKA KREDIT DARI PENGEMBANGAN PROFESI DAN KEGIATAN
                    PENUNJANG</th>
            </tr>
            <tr>
                <th class="center" style=" padding-bottom: 2rem;" colspan="6">NOMOR : {{ $no_surat }}</th>
            </tr>
            <tr>
                <td style="width: 150px;">Nama</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur?->nama }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">NIP</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur?->nip }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Nomor Seri Karpeg</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur?->nomor_karpeg }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Tempat/Tgl Lahir</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur->tempat_lahir . ', ' . \Carbon\Carbon::make($user?->userAparatur->tanggal_lahir)->format('Y-m-d') }}
                </td>
            </tr>
            <tr>
                <td style="width: 150px;">Jenis Kelamin</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur?->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Pangkat/Gol. Ruang/TMT</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user->userAparatur->pangkatGolonganTmt->nama . ' / ' . $user->userAparatur->golongan_tmt }}
                </td>
            </tr>
            <tr>
                <td style="width: 150px;">Jabatan/TMT</td>
                <td style="width: 10px;">:</td>
                <td>{{ $role?->display_name . ' / ' . $user->userAparatur->jabatan_tmt }}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Unit Kerja</td>
                <td style="width: 10px;">:</td>
                <td>{{ $user?->userAparatur?->nomenklaturPerangkatDaerah?->nama }}</td>
            </tr>
        </tbody>
    </table>
    <table width="98%" class="table table-light table-striped page-break">
        <tbody>
            <tr>
                <th class="center" style="text-transform: uppercase;" colspan="6">Hasil Penilaian Angka Kredit dari
                    Pengembangan Profesi dan
                    Kegiatan
                    Penunjang</th>
            </tr>
            <tr>
                <th class="center" width="200px">SUB UNSUR</th>
                <th class="center" width="200px">KEGIATAN</th>
                <th class="center" width="100px">HASIL KERJA/OUTPUT</th>
                <th class="center" width="60px">AK</th>
                <th class="center">VOLUME</th>
                <th class="center">JUMLAH AK</th>
            </tr>
            <tr>
                <th class="text-start" colspan="2">I. PENGEMBANGAN PROFESI</th>
                <th></th>
                <th width="60px"></th>
                <th></th>
                <th></th>
            </tr>
            @php
                $sub_unsur_id = null;
                $total_profesi = 0;
            @endphp
            @foreach ($profesis as $item)
                <tr>
                    @if ($sub_unsur_id != $item->sub_unsur_id)
                        <td>{{ $item->sub_unsur_nama }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan_hasil }}</td>
                        <td class="text-center">
                            {{ !is_null($item->angka_kredit) ? $item->angka_kredit : $item->angka_kredit_percent . '% AK Kenaikan Pangkat' }}
                        </td>
                        <td class="text-center">{{ $item->volume }}</td>
                        <td class="text-center">{{ $item->jumlah_ak }}</td>
                    @else
                        <td></td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan_hasil }}</td>
                        <td class="text-center">
                            {{ !is_null($item->angka_kredit) ? $item->angka_kredit : $item->angka_kredit_percent . '% AK Kenaikan Pangkat' }}
                        </td>
                        <td class="text-center">{{ $item->volume }}</td>
                        <td class="text-center">{{ $item->jumlah_ak }}</td>
                    @endif
                </tr>
                @php
                    $sub_unsur_id = $item->sub_unsur_id;
                    $total_profesi += $item->jumlah_ak;
                @endphp
            @endforeach
            <tr>
                <th class="text-start" colspan="5">JUMLAH ANGKA KREDIT PENGEMBANGAN PROFESI</th>
                <th>{{ $total_profesi }}</th>
            </tr>
            <tr>
                <th class="text-start" colspan="2">II. PENUNJANG</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @php
                $sub_unsur_id_2 = null;
                $total_penunjang = 0;
            @endphp
            @foreach ($penunjangs as $item)
                <tr>
                    @if ($sub_unsur_id_2 != $item->sub_unsur_id)
                        <td>{{ $item->sub_unsur_nama }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan_hasil }}</td>
                        <td class="text-center">
                            {{ !is_null($item->angka_kredit) ? $item->angka_kredit : $item->angka_kredit_percent . '% AK Kenaikan Pangkat' }}
                        </td>
                        <td class="text-center">{{ $item->volume }}</td>
                        <td class="text-center">{{ $item->jumlah_ak }}</td>
                    @else
                        <td></td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->satuan_hasil }}</td>
                        <td class="text-center">
                            {{ !is_null($item->angka_kredit) ? $item->angka_kredit : $item->angka_kredit_percent . '% AK Kenaikan Pangkat' }}
                        </td>
                        <td class="text-center">{{ $item->volume }}</td>
                        <td class="text-center">{{ $item->jumlah_ak }}</td>
                    @endif
                </tr>
                @php
                    $sub_unsur_id_2 = $item->sub_unsur_id;
                    $total_penunjang += $item->jumlah_ak;
                @endphp
            @endforeach
            <tr>
                <th class="text-start" colspan="5">JUMLAH ANGKA KREDIT PENUNJANG</th>
                <th>{{ $total_penunjang }}</th>
            </tr>
            <tr>
                <th class="text-start" colspan="5">AK PENUNJANG YANG DIDAPATKAN</th>
                <th>{{ $result }}</th>
            </tr>
        </tbody>
    </table>
    <table width="98%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td colspan="6" style="border-width: 0 !important;"> <br></td>
            </tr>
            <tr>
                <th colspan="2" style="border-width: 0 !important;" class="text-start">CATATAN AK PENGEMBANGAN
                    PROFESI:</th>
                <th style="border-width: 0 !important;"></th>
                <th style="border-width: 0 !important;" colspan="3" style="white-space: nowrap;" class="center">KETUA
                    TIM PENILAI</th>
            </tr>
            <tr>
                <td style="border-width: 0 !important;" colspan="2"> Terpenuhi/Tidak terpenuhi *) AK Pengembangan
                    Profesi untuk<br> Kenaikan Jenjang Jabatan
                    (Pemadam Kebakaran Mahir ke Pemadam<br> Kebakaran Penyelia/Analis Kebakaran Ahli Muda ke Analis
                    Kebakaran Ahli Madya)*</td>
                <td style="border-width: 0 !important;"><br></td>
                <td style="border-width: 0 !important;" colspan="3"></td>
            </tr>
            <tr>
                <td style="border-width: 0 !important;" colspan="2"></td>
                <td style="border-width: 0 !important;"><br></td>
                <td class="center" colspan="3" style="border-width: 0 !important; position: relative;">
                    @if (isset($penilai))
                        <img src="{{ linkToBasePath($penilai?->userPejabatStruktural?->file_ttd) }}"
                            style="width: 100px; max-height: 150px; position: absolute; right: 20%; top: -40px;"
                            alt="">
                    @endif
                </td>
            </tr>
            <tr>
                <td style="border-width: 0 !important; font-style: italic;" colspan="2"></td>
                <td style="border-width: 0 !important;"><br></td>
                <td style="border-width: 0 !important; padding-top: 10px;" colspan="3" class="center">
                    {{ isset($penilai) ? $penilai?->userPejabatStruktural?->nama : '-' }} <br>
                    NIP : {{ isset($penilai) ? $penilai?->userPejabatStruktural?->nip : '-' }}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

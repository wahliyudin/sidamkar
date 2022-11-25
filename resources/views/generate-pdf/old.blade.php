<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('assets/css/main/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        th,
        td {
            border: 1px black !important;
            border-collapse: collapse;
        }

        .center {
            text-align: center;
        }

        .bd {
            border-width: 0 !important;
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

        .letter {
            letter-spacing: 0.1rem;
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
    </style>

</head>

<body>
    <table width="100%" class="table table-light-none table-striped page-break">
        <thead>
            <tr>
                <th class="bd center letter" colspan="8">SURAT PERNYATAAN</th>
            </tr>
            <tr>
                <th class="bd center letter" colspan="8"
                    style="text-transform: uppercase; border: -1px solid black !important; outline: none !important;">
                    MELAKUKAN
                    KEGIATAN BAGI
                    {{ $user->roles()->first()->display_name }}
                    (JENJANG JABATAN)</th>
            </tr>
            <tr>
                <td class="bd center" colspan="8">
                    <br>
                </td>
            </tr>
        </thead>
    </table>
    <table width="100%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd letter" colspan="8">Bertanda tangan di bawah ini:</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Nama </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter" style="wihite-space: nowrap;">
                    {{ $user->mente->atasanLangsung->userPejabatStruktural->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">NIP </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter" style="wihite-space: nowrap;">
                    {{ $user->mente->atasanLangsung->userPejabatStruktural->nip }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Pangkat/Golongan
                    Ruang/TMT
                </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter" style="wihite-space: nowrap;">
                    {{ $user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt->nama }}
                </td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Jabatan </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter" style="wihite-space: nowrap;">
                    {{ $user->mente->atasanLangsung->roles()->first()->display_name }}
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd letter" colspan="8">Menyatakan bahwa:</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Nama </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter">{{ $user->userAparatur->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">NIP </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter">{{ $user->userAparatur->nip }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Pangkat/Golongan
                    Ruang/TMT </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter">{{ $user->userAparatur->pangkatGolonganTmt->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" style="padding-left: 2rem; white-space: nowrap;" width="30%">Jabatan </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;" width="2%">:</td>
                <td class="bd letter">{{ $user->roles()->first()->display_name }}</td>
            </tr>
        </tbody>
    </table>
    <table width="100%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd" colspan="8"><br></td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd letter" colspan="6">Telah melakukan kegiatan sesuai dengan ketentuan
                    perundang-undangan,
                    dengan rincian
                    sebagai berikut:</td>
                <td class="bd"><br></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%" class="table table-light">
        <tbody>
            <tr>
                <th class="center letter" width="30px">No</th>
                <th class="center letter">Uraian Kegiatan</th>
                <th class="center letter">Tanggal</th>
                <th class="center letter">Satuan Hasil</th>
                <th class="center letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">Volume</th>
                <th class="center letter">Angka Kredit</th>
                <th class="center letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">Jumlah Angka Kredit
                </th>
            </tr>
            @foreach ($unsurs as $unsur)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td colspan="8" class="letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">
                        {{ $unsur->nama }}
                    </td>
                </tr>
                @foreach ($unsur->subUnsurs as $subUnsur)
                    <tr>
                        <td><br></td>
                        <td colspan="8" class="letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">-
                            {{ $subUnsur->nama }}
                        </td>
                    </tr>
                    @foreach ($subUnsur->butirKegiatans as $butirKegiatan)
                        <tr>
                            <td></td>
                            <td class="letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                {{ $loop->iteration }}. {{ $butirKegiatan->nama }}
                            </td>
                            <td class="letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                {{ $butirKegiatan->laporanKegiatanJabatans->first()->created_at->format('Y-m-d') }}
                            </td>
                            <td class="letter" style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                {{ $butirKegiatan->satuan_hasil }}
                            </td>
                            <td class="center">
                                {{ $butirKegiatan->laporan_kegiatan_jabatans_count }}
                            </td>
                            <td class="center">{{ $butirKegiatan->score }}</td>
                            <td class="center">
                                {{ $butirKegiatan->laporan_kegiatan_jabatans_sum_score }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <td class="bd center letter" colspan="8">Demikian pernyataan ini dibuat untuk dapat dipergunakan
                    sebagaimana
                    mestinya</td>
            </tr>
            <tr>
                <td colspan="8" class="bd"><br></td>
            </tr>
            <tr>
                <td class="bd right letter" colspan="8">Atasan Langsung</td>
            </tr>
            <tr>
                <td class="bd right" colspan="8" height="100px">
                    <img src="{{ public_path('storage\ttd.png') }}" style="width: 150px;" alt="">
                </td>
            </tr>
            <tr>
                <td class="bd" colspan="8" style="text-decoration: underline; text-align: right;">
                    ......................................................</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

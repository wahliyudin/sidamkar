<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('assets/css/main/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: arial;
        }

        .header {
            text-align: center;
        }

        td,
        th {
            border-width: 1px !important;
            text-align: center;
            font-size: 13px
        }

        .nomor {
            text-align: center;
        }

        .inputan .header2 {
            width: 400px;
        }

        .tb {
            border-width: 0 !important;
            text-align: left !important;
        }

        .keterangan {
            text-align: left !important;
        }

        .tr {
            border-width: 0 !important;
            text-align: center !important;
        }

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
    <table align="center" style="width: 99% !important;" class="table table-light-none table-striped page-break">
        <thead>
            <tr>
                <th class="tb" colspan="7">
                    <h2 style="text-align: center; margin: 10px; font-weight: 700;">PENETAPAN ANGKA KREDIT</h2>
                </th>
            </tr>
            <tr>
                <th class="tb" colspan="7">
                    <h4 style="text-align: center;">NOMOR : </h3>
                </th>
            </tr>
        </thead>
    </table>
    <table align="center" style="width: 99% !important;" class="table table-light table-striped page-break">
        <tbody>
            <tr>
                <th colspan="7" class="text-start">
                    I. KETERANGAN PERORANGAN
                </th>
            </tr>
            <tr>
                <td width="20px" class="nomor">1</td>
                <td class="keterangan">Nama</td>
                <td class="inputan text-start" colspan="5">{{ $user?->userAparatur?->nama }}</td>
            </tr>
            <tr>
                <td width="20px" class="nomor">2</td>
                <td class="keterangan">NIP</td>
                <td class="inputan text-start" colspan="5">{{ $user?->userAparatur?->nip }}</td>
            </tr>
            <tr>
                <td width="20px" class="nomor">3</td>
                <td class="keterangan">NOMOR SERI KAPREG</td>
                <td class="inputan text-start" colspan="5">{{ $user?->userAparatur?->nomor_karpeg }}</td>
            </tr>
            <tr>
                <td width="20px" class="nomor">4</td>
                <td class="keterangan">PANGKAT/GOL. RUANG/TMT</td>
                <td class="inputan text-start" colspan="5">
                    {{ $user?->userAparatur?->pangkatGolonganTmt?->nama }}
                </td>
            </tr>
            <tr>
                <td width="20px" class="nomor">5</td>
                <td class="keterangan">TEMPAT/TGL LAHIR</td>
                <td class="inputan text-start" colspan="5">
                    {{ $user?->userAparatur?->tempat_lahir . ', ' . \Carbon\Carbon::make($user?->userAparatur->tanggal_lahir)->format('Y-m-d') }}
                </td>
            </tr>
            <tr>
                <td width="20px" class="nomor">6</td>
                <td class="keterangan">JENIS KELAMIN</td>
                <td class="inputan text-start" colspan="5">
                    {{ $user?->userAparatur?->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' }}
                </td>
            </tr>
            <tr>
                <td width="20px" class="nomor">7</td>
                <td class="keterangan">JABATAN/TMT</td>
                <td class="inputan text-start" colspan="5"></td>
            </tr>
            <tr>
                <td width="20px" class="nomor">8</td>
                <td class="keterangan">UNIT KERJA</td>
                <td class="inputan text-start" colspan="5"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th style="text-align: start;" colspan="3">II. PENETAPAN ANGKA KREDIT</th>
                <th style="text-align: center">AK LAMA</th>
                <th style="text-align: center">AK BARU</th>
                <th style="text-align: center">JUMLAH</th>
                <th style="text-align: center" colspan="1">KETERANGAN</th>
            </tr>
            <tr>
                <td>1</td>
                <td class="keterangan" colspan="2">AK Dasar yang diberikan/kelebihan AK</td>
                <td>{{ isset($data['ak_kelebihan']) ? $data['ak_kelebihan'] : 0 }}</td>
                <td>0</td>
                <td>{{ isset($data['ak_kelebihan']) ? $data['ak_kelebihan'] : 0 }}</td>
                <td colspan="1" class="text-start"></td>
            </tr>
            <tr>
                <td>2</td>
                <td class="keterangan" colspan="2">AK yang diperoleh dari pengalaman</td>
                <td>0</td>
                <td>{{ isset($data['ak_pengalaman']) ? $data['ak_pengalaman'] : 0 }}</td>
                <td>{{ isset($data['ak_pengalaman']) ? $data['ak_pengalaman'] : 0 }}</td>
                <td colspan="1" class="text-start"></td>
            </tr>
            <tr>
                <td>3</td>
                <td class="keterangan" colspan="2">AK Kegiatan Tugas Jabatan</td>
                <td>0</td>
                <td>{{ isset($data['jabatan']) ? $data['jabatan'] : 0 }}</td>
                <td>{{ isset($data['jabatan']) ? $data['jabatan'] : 0 }}</td>
                <td colspan="1" class="text-start"></td>
            </tr>
            <tr>
                <td>4</td>
                <td class="keterangan" colspan="2">AK Kegiatan Pengembangan Profesi</td>
                <td>0</td>
                <td>{{ isset($data['profesi']) ? $data['profesi'] : 0 }}</td>
                <td>{{ isset($data['profesi']) ? $data['profesi'] : 0 }}</td>
                <td colspan="1" class="text-start"></td>
            </tr>
            <tr>
                <td>5</td>
                <td class="keterangan" colspan="2">AK Kegiatan Penunjang</td>
                <td>0</td>
                <td>{{ isset($data['penunjang']) ? $data['penunjang'] : 0 }}</td>
                <td>{{ isset($data['penunjang']) ? $data['penunjang'] : 0 }}</td>
                <td colspan="1" class="text-start"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th colspan="5">TOTAL ANGKA KREDIT KENAIKAN PANGKAT/KUMULATIF</th>
                <th>{{ isset($data['total']) ? $data['total'] : 0 }}</th>
                <th></th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th colspan="4">KETERANGAN</th>
                <th>PANGKAT</th>
                <th>JENJANG JABATAN</th>
                <th>PENGEMBANGAN PROFESI</th>
            </tr>
            <tr>
                <td class="keterangan" colspan="4">Angka Kredit Minimal yang harus dipenuhi untuk kenaikan
                    pangkat/jenjang</td>
                <td>{{ isset($data['ak_kenaikan_pangkat']) ? $data['ak_kenaikan_pangkat'] : 0 }}</td>
                <td>{{ isset($data['ak_kenaikan_jenjang']) ? $data['ak_kenaikan_jenjang'] : 0 }}</td>
                <td>{{ isset($data['ak_min_profesi']) ? $data['ak_min_profesi'] : 0 }}</td>
            </tr>
            <tr>
                <td class="keterangan" colspan="4">Kelebihan/Kekurangan* Angka Kredit yang harus dicapai untuk
                    kenaikan pangkat/jenjang
                </td>
                <td>{{ isset($data['kelebihan_kekurangan_jabatan']) ? $data['kelebihan_kekurangan_jabatan'] : 0 }}</td>
                <td>{{ isset($data['kelebihan_kekurangan_jenjang']) ? $data['kelebihan_kekurangan_jenjang'] : 0 }}</td>
                <td>{{ isset($data['kelebihan_kekurangan_profesi']) ? $data['kelebihan_kekurangan_profesi'] : 0 }}</td>
            </tr>
        </tbody>
    </table>
    <table style="width: 99% !important;" class="table table-light-none table-striped page-break">
        <tbody>
            <tr>
                <th colspan="7" class="text-start py-1">III.
                    {{ isset($data['status_pangkat']) ? ($data['status_pangkat'] == true ? 'DAPAT' : 'TIDAK DAPAT') : '' }}
                    DIPERTIMBANGKAN UNTUK KENAIKAN
                    PANGKAT/JENJANG JABATAN SETINGKAT
                    LEBIH TINGGI MENJADI JENJANG ….... PANGKAT/GOLONGAN RUANG…............</th>
            </tr>
            <tr>
                <td class="tb py-2" colspan="4">Asli Penetapan Angka Kredit disampaikan kepada Pimpinan Instansi
                    Pengusul dan Pejabat
                    Fungsional yang bersangkutan, tembusan disampaikan kepada:</td>
                <td class="tr" colspan="3" style="text-align: start !important;">Ditetapkan di
                    …....................
                    <br>Pada tanggal
                    …...................
                </td>
            </tr>
            <tr>
                <td class="tb">1</td>
                <td class="tb" colspan="4">Pimpinan Instansi Pengusul;</td>
                <td class="tr" colspan="2" style="white-space: nowrap;">Pejabat Yang Menetapkan AK,</td>
            </tr>
            <tr>
                <td class="tb">2</td>
                <td class="tb" colspan="4">Pejabat yang menetapkan AK;</td>
                <td class="tb" colspan="2" rowspan="3"></td>
            </tr>
            <tr>
                <td class="tb">3</td>
                <td class="tb" colspan="3">Sekretaris Tim Penilai yang bersangkutan; dan</td>
                <td class="bd" colspan="2" style="position: relative;">
                    @if ($is_ttd_penetap == true)
                        <img src="{{ linkToBasePath($penetap->userPejabatStruktural->file_ttd) }}"
                            style="width: 130px; position: absolute; right: 20%; top: -20px;" alt="">
                    @endif
                </td>
            </tr>
            <tr>
                <td class="tb">4</td>
                <td class="tb" colspan="3">Pejabat Pimpinan Tingga Pratama yang membidangi Kepegawaian/Bagian
                    yang membidangi
                    kepegawaian yang bersangkutan.</td>
            </tr>
            <tr>
                <td class="tb" colspan="5"></td>
                <td class="tr" colspan="2" style="text-decoration: underline;">
                    @if ($is_ttd_penetap == true)
                        {{ $penetap->userPejabatStruktural->nama }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="tb" colspan="5"></td>
                <td class="tr" colspan="2" style="">NIP :
                    {{ $is_ttd_penetap == true ? $penetap->userPejabatStruktural->nip : '-' }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

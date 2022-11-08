<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        th,
        td {
            border-width: 1px !important;
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
    </style>

</head>

<body>

    <table width="700px">
        <thead>
            <tr>
                <th class="bd center" colspan="8">SURAT PERNYATAAN</th>
            </tr>
            <tr>
                <th class="bd center" colspan="8" style="text-transform: uppercase;">MELAKUKAN KEGIATAN BAGI
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
    <table>
        <tbody>
            <tr>
                <td class="bd" colspan="8">Bertanda tangan di bawah ini:</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 1.5rem;">Nama </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->mente->atasanLangsung->userPejabatStruktural->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 1.5rem;">NIP </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->mente->atasanLangsung->userPejabatStruktural->nip }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 1.5rem;">Pangkat/Golongan Ruang/TMT </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->mente->atasanLangsung->userPejabatStruktural->pangkatGolonganTmt->nama }}
                </td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 1.5rem;">Jabatan </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->mente->atasanLangsung->roles()->first()->display_name }}
                </td>
            </tr>
            {{-- <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 1.5rem;">Unit Kerja</td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">Fadila Prasetyo Yudho</td>
            </tr> --}}
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="bd" colspan="8">Menyatakan bahwa:</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 2rem;">Nama </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->userAparatur->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 2rem;">NIP </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->userAparatur->nip }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 2rem;">Pangkat/Golongan Ruang/TMT </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->userAparatur->pangkatGolonganTmt->nama }}</td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 2rem;">Jabatan </td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">{{ $user->roles()->first()->display_name }}</td>
            </tr>
            {{-- <tr>
                <td class="bd"><br></td>
                <td class="bd" style="padding-left: 2rem;">Unit Kerja</td>
                <td class="bd" style="padding-left: 1rem; padding-right: .5rem;">:</td>
                <td class="bd">Fadila Prasetyo Yudho</td>
            </tr> --}}
        </tbody>
    </table>
    <table width="700px">
        <tbody>
            <tr>
                <td class="bd" colspan="8"><br></td>
            </tr>
            <tr>
                <td class="bd"><br></td>
                <td class="bd" colspan="6">Telah melakukan kegiatan sesuai dengan ketentuan perundang-undangan,
                    dengan rincian
                    sebagai berikut:</td>
                <td class="bd"><br></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="700px">
        <tbody>
            <tr>
                <th class="center" width="30px">No</th>
                <th class="center" width="150">Uraian Kegiatan</th>
                <th class="center">Satuan Hasil</th>
                <th class="center" style="padding-left: 0.5rem; padding-right: 0.5rem;">Volume</th>
                <th class="center">Angka Kredit</th>
                <th class="center" style="padding-left: 0.5rem; padding-right: 0.5rem;">Jumlah Angka Kredit</th>
            </tr>
            <?php
            $unsur_id = '';
            $no = 1;
            ?>
            @foreach ($rencanas as $rencana)
                @foreach ($rencana->rencanaUnsurs as $rencanaUnsur)
                    @if ($unsur_id == $rencanaUnsur->unsur->id)
                        @foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur)
                            <tr>
                                <td><br></td>
                                <td colspan="7" style="padding-left: 0.5rem; padding-right: 0.5rem;">-
                                    {{ $rencanaSubUnsur->subUnsur->nama }}</td>
                            </tr>
                            @foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan)
                                <tr>
                                    <td></td>
                                    <td style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                        {{ $loop->iteration }}. {{ $rencanaButirKegiatan->butirKegiatan->nama }}
                                    </td>
                                    <td style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                        {{ $rencanaButirKegiatan->butirKegiatan->satuan_hasil }}
                                    </td>
                                    <td class="center">
                                        {{ $rencanaButirKegiatan->laporan_kegiatan_jabatans_count }}
                                    </td>
                                    <td class="center">{{ $rencanaButirKegiatan->butirKegiatan->score }}</td>
                                    <td class="center">
                                        {{ $rencanaButirKegiatan->laporan_kegiatan_jabatans_sum_score }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <td style="text-align: center;">{{ $no }}</td>
                            <td colspan="7" style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                {{ $rencanaUnsur->unsur->nama }}</td>
                        </tr>
                        @foreach ($rencanaUnsur->rencanaSubUnsurs as $rencanaSubUnsur)
                            <tr>
                                <td><br></td>
                                <td colspan="7" style="padding-left: 0.5rem; padding-right: 0.5rem;">-
                                    {{ $rencanaSubUnsur->subUnsur->nama }}</td>
                            </tr>
                            @foreach ($rencanaSubUnsur->rencanaButirKegiatans as $rencanaButirKegiatan)
                                <tr>
                                    <td></td>
                                    <td style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                        {{ $loop->iteration }}. {{ $rencanaButirKegiatan->butirKegiatan->nama }}
                                    </td>
                                    <td style="padding-left: 0.5rem; padding-right: 0.5rem;">
                                        {{ $rencanaButirKegiatan->butirKegiatan->satuan_hasil }}
                                    </td>
                                    <td class="center">
                                        {{ $rencanaButirKegiatan->laporan_kegiatan_jabatans_count }}
                                    </td>
                                    <td class="center">{{ $rencanaButirKegiatan->butirKegiatan->score }}</td>
                                    <td class="center">
                                        {{ $rencanaButirKegiatan->laporan_kegiatan_jabatans_sum_score }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif

                    <?php
                    $unsur_id = $rencanaUnsur->unsur->id;
                    $no++;
                    ?>
                @endforeach
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="700px">
        <tbody>
            <tr>
                <td class="bd center" colspan="8">Demikian pernyataan ini dibuat untuk dapat dipergunakan
                    sebagaimana
                    mestinya</td>
            </tr>
            <tr>
                <td colspan="8" class="bd"><br></td>
            </tr>
            <tr>
                <td class="bd right" colspan="8">Atasan Langsung</td>
            </tr>
            <tr>
                <td class="bd right" colspan="8" height="100px"><br></td>
            </tr>
            <tr>
                <td class="bd" colspan="8" style="text-decoration: underline; text-align: right;">
                    ......................................................</td>
            </tr>
        </tbody>
    </table>



</body>

</html>

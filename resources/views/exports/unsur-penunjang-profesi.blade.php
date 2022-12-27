<table style="border: 1px solid black;">
    <thead>
        <tr>
            <th style="font-weight: 700; width: 100px;">Unsur ID</th>
            <th style="font-weight: 700; width: 200px;">Unsur</th>
            <th style="font-weight: 700; width: 200px;">Sub Unsur ID</th>
            <th style="font-weight: 700; width: 200px;">Sub Unsur</th>
            <th style="font-weight: 700; width: 100px;">Butir Kegiatan ID</th>
            <th style="font-weight: 700; width: 100px;">Jabatan ID</th>
            <th style="font-weight: 700; width: 200px;">Butir Kegiatan</th>
            <th style="font-weight: 700; width: 200px;">Satuan Hasil</th>
            <th style="font-weight: 700; width: 100px;">Angka Kredit</th>
            <th style="font-weight: 700; width: 100px;">Angka Kredit (%)</th>
            <th style="font-weight: 700; width: 100px;">Sub Butir Kegiatan ID</th>
            <th style="font-weight: 700; width: 100px;">Jabatan ID</th>
            <th style="font-weight: 700; width: 200px;">Sub Butir Kegiatan</th>
            <th style="font-weight: 700; width: 200px;">Satuan Hasil</th>
            <th style="font-weight: 700; width: 100px;">Angka Kredit</th>
            <th style="font-weight: 700; width: 100px;">Angka Kredit (%)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unsurs as $unsur)
            <tr>
                <td>{{ $unsur->id }}</td>
                <td>{{ $unsur->nama }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="background-color: red; color: white; width: 200px;">Yang Column A, C, E, K jangan dikasi
                    nomor</td>
            </tr>
            @foreach ($unsur->subUnsurs as $subUnsur)
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ $subUnsur->id }}</td>
                    <td>{{ $subUnsur->nama }}</td>
                </tr>
                @foreach ($subUnsur->butirKegiatans as $butirKegiatan)
                    @if (count($butirKegiatan->subButirKegiatans) > 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $butirKegiatan->id }}</td>
                            <td>{{ $butirKegiatan->role_id }}</td>
                            <td>{{ $butirKegiatan->nama }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($butirKegiatan->subButirKegiatans as $subButirKegiatan)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $subButirKegiatan->id }}</td>
                                <td>{{ $subButirKegiatan->role_id }}</td>
                                <td>{{ $subButirKegiatan->nama }}</td>
                                <td>{{ $subButirKegiatan->satuan_hasil }}</td>
                                <td>{{ $subButirKegiatan->score }}</td>
                                <td>{{ $subButirKegiatan->percent }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $butirKegiatan->id }}</td>
                            <td>{{ $butirKegiatan->role_id }}</td>
                            <td>{{ $butirKegiatan->nama }}</td>
                            <td>{{ $butirKegiatan->satuan_hasil }}</td>
                            <td>{{ $butirKegiatan->score }}</td>
                            <td>{{ $butirKegiatan->percent }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </tbody>
</table>

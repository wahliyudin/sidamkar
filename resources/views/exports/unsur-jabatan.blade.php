<table>
    <thead>
        <tr>
            <th style="font-weight: 700; width: 100px;">Unsur ID</th>
            <th style="font-weight: 700; width: 200px;">Unsur</th>
            <th style="font-weight: 700; width: 100px;">Sub Unsur ID</th>
            <th style="font-weight: 700; width: 200px;">Sub Unsur</th>
            <th style="font-weight: 700; width: 100px;">Butir Kegiatan ID</th>
            <th style="font-weight: 700; width: 100px;">Jabatan ID</th>
            <th style="font-weight: 700; width: 200px;">Butir Kegiatan</th>
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
                <td style="background-color: red; color: white; width: 200px;">Yang Column A, C, E jangan dikasi nomor
                </td>
            </tr>
            @foreach ($unsur->subUnsurs as $subUnsur)
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{ $subUnsur->id }}</td>
                    <td>{{ $subUnsur->nama }}</td>
                </tr>
                @foreach ($subUnsur->butirKegiatans as $butirKegiatan)
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
                @endforeach
            @endforeach
        @endforeach
    </tbody>
</table>

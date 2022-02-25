@foreach($dtmapel as $mapel)
<tr>
    <td>{{ $mapel->mapel->nama_mapel }}</td>
    <td>{{ $mapel->Tugas_1 }}</td>
    <td>{{ $mapel->Tugas_2 }}</td>
    <td>{{ $mapel->Tugas_3 }}</td>
    <td>{{ $mapel->Tugas_4 }}</td>
    <td>{{ $mapel->Tugas_5 }}</td>
    <td>{{ $mapel->UTS}}</td>
    <td>{{ $mapel->UAS }}</td>
    <td class="{{ (($mapel->keterangan == 'Tidak Tuntas') ? "text-danger":"text-success") }}"> <b> {{ $mapel->nilai_rapor }}</b> </td>
    <td>{{ $mapel->mapel->KKM }}</td>
  </tr>
@endforeach
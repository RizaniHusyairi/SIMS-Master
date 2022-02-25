@foreach($dtsiswa as $siswa)
<tr>
    <th scope="row">{{ $siswa->NISN }}</th>
    <td>{{ $siswa->name }}</td>
    <td>{{ $siswa->Tugas_1 }}</td>
    <td>{{ $siswa->Tugas_2 }}</td>
    <td>{{ $siswa->Tugas_3 }}</td>
    <td>{{ $siswa->Tugas_4 }}</td>
    <td>{{ $siswa->Tugas_5 }}</td>
    <td>{{ $siswa->UTS}}</td>
    <td>{{ $siswa->UAS }}</td>
    <td class="{{ (($siswa->keterangan == 'Tidak Tuntas') ? "text-danger":"text-success") }}"> <b> {{ $siswa->nilai_rapor }}</b> </td>
    <td>{{ $siswa->KKM }}</td>
    <td><a href="/guru/nilaisiswa/{{ $siswa->id }}/edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Nilai" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a></td>
  </tr>
@endforeach
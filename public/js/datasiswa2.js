

$('.detail_siswa').click(function(){
    let idsiswa = $(this).attr('data-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }
    });
    $.get(`/guru/datasiswa/${idsiswa}`,{},function (data,status) {
        let nama = data.nama_siswa.split(" ");
        $('#nama_siswa').text(nama[0]);
        $('#foto').attr('src',`/storage/${data.foto}`);
        $('#NISN').text(data.NISN);
        $('#nama_lengkap').text(data.nama_siswa);
        $('#kelas').text(data.kelas);
        $('#jurusan').text(data.jurusan);
        $('#TTL').text(`${data.tempat_lahir} / ${data.tgl_lahir}`);
        $('#J_kelamin').text(data.jenis_kelamin);
        $('#alamat').text(data.alamat);
        $('#nama_wali').text(data.nama_wali);
        $('#email').text(data.email);
    });
})
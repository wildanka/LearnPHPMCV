$(function() {
  //onReady
  $('#tampilModalUbah').on('click', function() {
    console.log('id tampilModalUbah di klik');
    $('#mahasiswaModalLabel').html('Ubah Data Mahasiswa');
  });

  $('#tampilModalTambah').on('click', function() {
    console.log('id tampilModalUbah di klik');
    $('#mahasiswaModalLabel').html('Tambah Data Mahasiswa');
  });
});

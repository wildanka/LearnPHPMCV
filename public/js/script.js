$(function() {
  //onReady
  $('#tampilModalTambah').on('click', function() {
    console.log('id tampilModalUbah di klik');
    $('#mahasiswaModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambahkan Data');
  });

  $('.tampilModalUbah').on('click', function() {
    console.log('id tampilModalUbah di klik');
    $('#mahasiswaModalLabel').html('Ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');

    const id = $(this).data('id');
    // dataType: 'json',
    $.ajax({
      url:
        'http://localhost/belajarphpmvc/public/mahasiswa/ubah_data_mahasiswa',
      method: 'post',
      data: { id: id },
      dataType: 'json',
      success: function(data) {
        console.log(data);
      }
    });
  });
});

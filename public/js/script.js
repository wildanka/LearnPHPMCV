$(function() {
  //onReady
  $('#tampilModalTambah').on('click', function() {
    console.log('id tampilModalUbah di klik');
    $('#mahasiswaModalLabel').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambahkan Data');
    $('#nama').val('');
    $('#nim').val('');
    $('#email').val('');
    $('#jurusan').val('-- Pilih Jurusan --');
  });

  $('.tampilModalUbah').on('click', function() {
    $('#mahasiswaModalLabel').html('Ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    //sekarang kita merubah action dari button pada form ketika di hit maka akan memanggil PHP untuk merubah data, bukan menambah
    $('.modal-body form').attr(
      'action',
      'http://localhost/belajarphpmvc/public/mahasiswa/ubah_mahasiswa'
    );

    const id = $(this).data('id');
    // dataType: 'json',
    $.ajax({
      url:
        'http://localhost/belajarphpmvc/public/mahasiswa/get_detail_to_update_mahasiswa',
      method: 'post',
      data: { id: id },
      dataType: 'json',
      success: function(data) {
        $('#nama').val(data.nama);
        $('#nim').val(data.nim);
        $('#email').val(data.email);
        $('#jurusan').val(data.jurusan);
        $('#id').val(data.id);
      }
    });
  });
});

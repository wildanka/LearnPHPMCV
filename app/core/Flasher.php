<?php

class Flasher
{
   //akan dipanggil dan dibantu oleh bootstrap
   /**
    * akan menampilkan "Data mahasiswa $pesan $aksi", contoh "Data mahasiswa berhasil diubah" / "Data mahasiswa berhasil ditambah" 
    * $tipe tipe notifikasi yang digunakan (untuk UI) bisa berhasil/success, atau gagal/failed
    */
   public static function setFlash($pesan, $aksi, $tipe)
   {
      $_SESSION['flash'] = [
         'pesan' => $pesan,
         'aksi' => $aksi,
         'tipe' => $tipe
      ];
   }

   public static function getFlash()
   {
      //apakah ada session bernama flash? jika ada
      if (isset($_SESSION['flash'])) {
         echo '
         <div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         ';

         unset($_SESSION['flash']);
      }
   }
}

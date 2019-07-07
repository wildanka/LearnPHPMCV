<?php

class About{

   /**
    * "index" merupakan method default, 
    * Kita perlu membuat method index, agar ketika controller About dipanggil tanpa ada method PHP tidak akan mengarahkan kita ke route default
    */
   public function index($nama = 'Wildan K', $pekerjaan='Sultan') //berikan nilai default jika $nama dan $pekerjaan kosong
   {
      //   echo '(anda memanggil) About/Index';
      echo "Hallo, nama saya $nama, saya adalah seorang $pekerjaan";
   }
   public function page(){
      echo '(anda memanggil) About/Page';
   }
}
<?php

class About extends Controller
{

   /**
    * "index" merupakan method default, 
    * Kita perlu membuat method index, agar ketika controller About dipanggil tanpa ada method PHP tidak akan mengarahkan kita ke route default
    */
   public function index($nama = 'Wildan K', $pekerjaan = 'Sultan', $usia = 24) //berikan nilai default jika $nama dan $pekerjaan kosong
   {
      //gunakan array associative untuk mengirimkan array $data
      $data['nama'] = $nama;
      $data['pekerjaan'] = $pekerjaan;
      $data['usia'] = $usia;

      //kirimkan $data sebagai argument kedua saat memanggil method view
      $this->view('templates/header', $data);
      $this->view('about/index', $data);
      $this->view('templates/footer', $data);
   }
   public function page()
   {
      $this->view('about/page');
   }
}

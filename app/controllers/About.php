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
      $header_data['judul'] = 'About';
      //kirimkan $data sebagai argument kedua saat memanggil method view
      $this->view('templates/header', $header_data);
      $this->view('about/index', $data);
      $this->view('templates/footer');
   }
   public function page()
   {
      $header_data['judul'] = 'About - Page';
      $this->view('templates/header', $header_data);
      $this->view('about/page');
      $this->view('templates/footer');
   }
}

<?php

class Mahasiswa extends Controller
{
   // method default
   public function index()
   {
      $data['judul'] = 'Daftar Mahasiswa';
      $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
      $this->view('templates/header', $data);
      $this->view('mahasiswa/index', $data);
      $this->view('templates/footer');
   }
}

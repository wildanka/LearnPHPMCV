<?php

class Mahasiswa extends Controller
{
   // method default
   public function index()
   {
      $data['judul'] = 'Daftar Mahasiswa';
      $this->view('templates/header', $data);
      $this->view('mahasiswa/index');
      $this->view('templates/footer');
   }
}

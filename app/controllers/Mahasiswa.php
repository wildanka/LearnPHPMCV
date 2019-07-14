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

   // tampilkan detail mahasiswa dengan id tertentu
   public function detail($id)
   {
      $data['judul'] = 'Detail Mahasiswa';
      $data['mhs'] = $this->model('Mahasiswa_model')->getDetailMahasiswabyId($id);
      $this->view('templates/header', $data);
      $this->view('mahasiswa/detail', $data);
      $this->view('templates/footer');
   }


   // method untuk menambahkan data mahasiswa yang baru
   public function tambah()
   {
      // var_dump($_POST);
      if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) { //jika ada baris baru yang ditambahkan
         //berarti data berhasil masuk, maka arahkan user ke halaman
         header('Location: ' . BASE_URL . '/mahasiswa');
         exit;
      }
   }
}

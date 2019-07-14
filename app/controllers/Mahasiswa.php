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
         Flasher::setFlash('berhasil', 'ditambahkan', 'success');
         //berarti data berhasil masuk, maka arahkan user ke halaman
         header('Location: ' . BASE_URL . '/mahasiswa');
         exit;
      } else {
         Flasher::setFlash('gagal', 'ditambahkan', 'danger');
         header('Location: ' . BASE_URL . '/mahasiswa');
         exit;
      }
   }

   // method untuk menghapus data mahasiswa
   public function delete_mahasiswa($id)
   {
      if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) { //jika ada baris baru yang dirubah
         Flasher::setFlash('berhasil', 'dihapus', 'success');
         header('Location: ' . BASE_URL . '/mahasiswa');
         exit;
      } else {
         Flasher::setFlash('gagal', 'dihapus', 'danger');
         header('Location: ' . BASE_URL . '/mahasiswa');
         exit;
      }
   }
}

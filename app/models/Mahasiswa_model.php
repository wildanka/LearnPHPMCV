<?php
class Mahasiswa_model
{
   //konek ke database menggunakan driver PDO (PHP Data Object), sehingga memudahkan kita ketika mengganti database, misalnya jika kita tidak ingin menggunakan MySQL lagi (MongoDB, Postgre, dll.)
   private $dbh; //database helper
   private $stmt; //database statement

   /**
    * Lakukan koneksi ke database di dalam method __construct sehingga ketika model ini dipanggil akan membuka koneksi ke database.
    */
   public function __construct()
   {
      //sekarang kita melakukan koneksi menggunakan cara paling mudah. (jangan digunakan untuk produksi, jangan simpan username, password, dan nama DB kalian di file ini) sebaiknya simpan di file lain supaya tidak mudah diakses oleh orang yang tidak berhak
      //datasource name
      $dsn = 'mysql:host=localhost;dbname=belajarphpmvc;';

      try { //coba membuat koneksi
         $this->dbh = new PDO($dsn, 'root', '');
      } catch (PDOException $e) {
         //jika terjadi error hentikan program dan tampilkan pesan Errornya
         die($e->getMessage());
      }
   }

   public function getMhs()
   {
      $this->stmt = $this->dbh->prepare('SELECT * FROM t_mahasiswa');
      $this->stmt->execute();
      //jika pada driver mysql adalah mysqli_fetch_assoc, maka dengan driver PDO cara kita mendapatkan hasil eksekusi query adalah sebagai berikut.
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}

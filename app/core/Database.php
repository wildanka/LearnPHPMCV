<?php

class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $db_name = DB_NAME;

   private $db;
   private $stmt; //database statement


   public function __construct()
   {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';';
      //option digunakan untuk mengoptimasi koneksi ke Database. konfigurasi option disimpan di dalam sebuah array
      $option = [
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ];

      try { //coba membuat koneksi
         $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
      } catch (PDOException $e) {
         //jika terjadi error hentikan program dan tampilkan pesan Errornya
         die($e->getMessage());
      }
   }

   /**
    * method untuk melakukan prepare Query  terhadap databaseHelper
    */
   public function query($query)
   {
      $this->stmt = $this->dbh->prepare($query);
   }

   /**
    * where, into values, set akan dimasukkan lewat bind
    */
   public function bind($param, $value, $type = null)
   {
      if (is_null($type)) {
         switch (true) {
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value):
               $type = PDO::PARAM_INT;
               break;
            default:
               $type = PDO::PARAM_STR;
               break;
         }
      }
      $this->stmt->bindValue($param, $value, $type);
   }

   /**
    * mengeksekusi statement dengan PDO
    */
   public function execute()
   {
      $this->stmt->execute();
   }

   /**
    * mengeksekusi execute() kemudian mengembalikan banyak data
    */
   public function resultSet()
   {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   /**
    * mengeksekusi execute() kemudian mengembalikan satu data
    */
   public function single()
   {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
   }

   /**
    * method ini akan menghitung jumlah baris yang berubah di tab
    */
   public function rowCount()
   {
      return $this->stmt->rowCount(); //$this->stmt->rowCount() yang ini milik PDO
   }
}

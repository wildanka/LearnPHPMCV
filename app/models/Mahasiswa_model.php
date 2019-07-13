<?php
class Mahasiswa_model
{
   private $mhs = [
      [
         "nama" => "Wildan Kurniadi",
         "nim" => "10113211",
         "email" => "danprogramming10@gmail.com",
         "jurusan" => "Teknik Informatika"
      ],
      [
         "nama" => "Arief Hidayat",
         "nim" => "10113222",
         "email" => "arief.hidayat@gmail.com",
         "jurusan" => "Teknik Informatika"
      ],
      [
         "nama" => "Anindya Khoirunnisa",
         "nim" => "10113233",
         "email" => "anindyadesign@gmail.com",
         "jurusan" => "Desain Komunikasi Visual"
      ]
   ];

   public function getMhs()
   {
      return $this->mhs;
   }
}

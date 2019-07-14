<div class="container mt-5">
   <div class="row">
      <div class="col-6">
         <h3>Daftar Mahasiswa</h3>

         <?php foreach ($data['mahasiswa'] as $mhs) : ?>
            <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  <?= $mhs['nama'] ?>

                  <a href="<?= BASE_URL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>"><span class="badge badge-primary badge-pill">Lihat Detail</span></a>

               </li>
            </ul>

         <?php endforeach; ?>

         <!-- 
            <ul>
               <li><?= $mhs[' nama '] ?></li>
               <li><?= $mhs[' nim '] ?></li>
               <li><?= $mhs[' jurusan '] ?></li>
               <li><?= $mhs[' email'] ?></li>
            </ul>
          -->
      </div>
   </div>
</div>
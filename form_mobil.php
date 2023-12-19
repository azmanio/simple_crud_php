<?php
    include "scripts/config.php";
    include "includes/header.php";
?>

<div class="container">
    <div class="mt-3">
        <h1 class="text-center">Data Mobil</h1>
        <h4 class="text-center">Penyewaan Mobil Di PT JEKUY</h4>
    </div>
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="index.php" style="color: #ffffff;">Beranda</a></li>
                <li class="breadcrumb-item" aria-current="page" style="color: #ffffff;">Mobil</li>
            </ol>
        </nav>
    </div>
    <div class="card-body">

        <button href="form_mobil.php" type="button" class="btn btn-success bg-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"> [+] </button>

        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>Nomor</th>
                <th>ID Mobil</th>
                <th>Plat Mobil</th>
                <th>Merk Mobil</th>
                <th>Warna Mobil</th>
                <th>Tahun Mobil</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no=1;
            $tampil=mysqli_query($db,"SELECT * FROM jenisMobil");
            while($data = mysqli_fetch_array($tampil)) :
            ?> 
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['idMobil']?></td>
                    <td><?= $data['platMobil']?></td>
                    <td><?= $data['merkMobil']?></td>
                    <td><?= $data['warnaMobil']?></td>
                    <td><?= $data['tahunMobil']?></td>
                    <td>
                        <a href="action.php" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUbah<?=$no?>">
                        <img src="assets/edit.png" style="width: 20px;" alt="Ubah">
                        </a>
                        <a href="action.php" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?=$no?>">
                            <img src="assets/hapus.png" style="width: 20px;" alt="Hapus">
                        </a>
                    </td>
                </tr>

                <!-- awal modal ubah-->
                <div class="modal fade " id="modalUbah<?=$no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Pelanggan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="action.php">
                                <input type="hidden" name="idMobil" value="<?=$data['idMobil']?>">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">ID Mobil</label>
                                        <input type="text" class="form-control" name="idMobil" 
                                        value="<?=$data['idMobil']?>" placeholder="Masukkan ID Mobil">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Plat Mobil</label>
                                        <input type="text" class="form-control" name="platMobil" 
                                        value="<?=$data['platMobil']?>" placeholder="Masukkan Plat Mobil">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Merk Mobil</label>
                                        <input type="text" class="form-control" name="merkMobil" 
                                        value="<?=$data['merkMobil']?>" placeholder="Masukkan Merk Mobil">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Warna Mobil</label>
                                        <input type="text" class="form-control" name="warnaMobil" 
                                        value="<?=$data['warnaMobil']?>" placeholder="Masukkan Warna Mobil">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Tahun Mobil</label>
                                        <input type="text" class="form-control" name="tahunMobil" 
                                        value="<?=$data['tahunMobil']?>" placeholder="Masukkan Tahun Mobil">
                                    </div>
                                </div>
                            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-success" name="ubahMobil">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal ubah -->

                <!-- awal modal hapus -->
                <div class="modal fade " id="modalHapus<?=$no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Menghapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="action.php">
                                <input type="hidden" name="idMobil" value="<?=$data['idMobil']?>">                             
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda ingin menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-danger" name="hapusMobil">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal hapus -->
            <?php endwhile; ?>
        </table>
        
        <!-- awal modal tambah -->
        <div class="modal fade " id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mobil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="action.php">
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">ID Mobil</label>
                                <input type="text" class="form-control" name="idMobil" placeholder="Masukkan ID Mobil">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Plat Mobil</label>
                                <input type="text" class="form-control" name="platMobil" placeholder="Masukkan Plat Mobil">
                            </div>
                     
                            <div class="mb-2">
                                <label class="form-label">Merk Mobil</label>
                                <input type="text" class="form-control" name="merkMobil" placeholder="Masukkan Merk Mobil">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Warna Mobil</label>
                                <input type="text" class="form-control" name="warnaMobil" placeholder="Masukkan Warna Mobil">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Tahun Mobil</label>
                                <input type="text" class="form-control" name="tahunMobil" placeholder="Masukkan Tahun Mobil">
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                            <button href="action.php" type="submit" class="btn btn-success" name="simpanMobil">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal tambah -->
        
    </div>
</div>

<?php include "includes/footer.php"?>
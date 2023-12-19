<?php
    include "scripts/config.php";
    include "includes/header.php";
?>

<div class="container">
    <div class="mt-3">
        <h1 class="text-center">Data Tarif Sewa</h1>
        <h4 class="text-center">Penyewaan Mobil Di PT JEKUY</h4>
    </div>
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="index.php" style="color: #ffffff;">Beranda</a></li>
                <li class="breadcrumb-item" aria-current="page" style="color: #ffffff;">Tarif</li>
            </ol>
        </nav>
    </div>
    <div class="card-body">

        <button href="form_mobil.php" type="button" class="btn btn-success bg-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"> [+] </button>

        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>Nomor</th>
                <th>ID Tarif</th>
                <th>Waktu Sewa</th>
                <th>Tarif Perhari</th>
                <th>Total Tarif</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no=1;
            $tampil=mysqli_query($db,"SELECT * FROM tarif");
            while($data = mysqli_fetch_array($tampil)) :
            ?> 
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['idTarif']?></td>
                    <td><?= $data['waktuSewa']?></td>
                    <td><?= $data['tarifPerHari']?></td>
                    <td><?= $data['totalTarif']?></td>
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
                                <input type="hidden" name="idTarif" value="<?=$data['idTarif']?>">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">ID Tarif</label>
                                        <input type="text" class="form-control" name="idTarif" 
                                        value="<?=$data['idTarif']?>" placeholder="Masukkan ID Tarif">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Waktu Sewa</label>
                                        <input type="text" class="form-control" name="waktuSewa" 
                                        value="<?=$data['waktuSewa']?>" placeholder="Masukkan Waktu Sewa">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tarif Perhari</label>
                                        <input type="text" class="form-control" name="tarifPerHari" 
                                        value="<?=$data['tarifPerHari']?>" placeholder="Masukkan Tarif Perhari">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Total Tarif</label>
                                        <input type="text" class="form-control" name="totalTarif" 
                                        value="<?=$data['totalTarif']?>" placeholder="Masukkan Total Tarif">
                                    </div>
                                </div>
                            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-success" name="ubahTarif">Ubah</button>
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
                                <input type="hidden" name="idTarif" value="<?=$data['idTarif']?>">                             
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda ingin menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-danger" name="hapusTarif">Hapus</button>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Tarif</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="action.php">
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">ID Tarif</label>
                                <input type="text" class="form-control" name="idTarif" placeholder="Masukkan ID Tarif">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Waktu Sewa</label>
                                <input type="text" class="form-control" name="waktuSewa" placeholder="Masukkan Waktu Sewa">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Tarif Perhari</label>
                                <input type="text" class="form-control" name="tarifPerHari" placeholder="Masukkan Tarif Perhari">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Total Tarif</label>
                                <input type="text" class="form-control" name="totalTarif" placeholder="Masukkan Total Tarif">
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                            <button href="action.php" type="submit" class="btn btn-success" name="simpanTarif">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal tambah -->
        
    </div>
</div>

<?php include "includes/footer.php"?>
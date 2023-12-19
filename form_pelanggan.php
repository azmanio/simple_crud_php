<?php
    include "scripts/config.php";
    include "includes/header.php";
?>

<div class="container">
    <div class="mt-3">
        <h1 class="text-center">Data Pelanggan</h1>
        <h4 class="text-center">Penyewaan Mobil Di PT JEKUY</h4>
    </div>
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="index.php" style="color: #ffffff;">Beranda</a></li>
                <li class="breadcrumb-item" aria-current="page" style="color: #ffffff;">Pelanggan</li>
            </ol>
        </nav>
    </div>
    <div class="card-body">

        <button href="form_pelanggan.php" type="button" class="btn btn-success bg-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"> [+] </button>

        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>Nomor</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>No KTP</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no=1;
            $tampil=mysqli_query($db,"SELECT * FROM pelanggan");
            while($data = mysqli_fetch_array($tampil)) :
            ?> 
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['idPelanggan']?></td>
                    <td><?= $data['namaPelanggan']?></td>
                    <td><?= $data['alamatPelanggan']?></td>
                    <td><?= $data['jkPelanggan']?></td>
                    <td><?= $data['noHpPelanggan']?></td>
                    <td><?= $data['noKtpPelanggan']?></td>
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
                                <input type="hidden" name="idPelanggan" value="<?=$data['idPelanggan']?>">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">ID Pelanggan</label>
                                        <input type="text" class="form-control" name="idPelanggan" 
                                        value="<?=$data['idPelanggan']?>" placeholder="Masukkan ID Pelanggan">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="namaPelanggan" 
                                        value="<?=$data['namaPelanggan']?>" placeholder="Masukkan Nama Pelanggan">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="textarea" class="form-control" name="alamatPelanggan" 
                                        value="<?=$data['alamatPelanggan']?>" placeholder="Masukkan Alamat Pelanggan">
                                    </div>

                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="jkPelanggan"  value="Laki-Laki" <?php if($data['jkPelanggan']=='Laki-Laki') { ?> checked='' <?php } ?> >
                                        <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                                    </div>
                                    
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="jkPelanggan" value="Perempuan" <?php if ($data['jkPelanggan'] == 'Perempuan') { ?> checked='' <?php } ?>  >
                                        <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">No HP</label>
                                        <input type="text" class="form-control" name="noHpPelanggan" 
                                        value="<?=$data['noHpPelanggan']?>" placeholder="Masukkan No HP Pelanggan">
                                    </div>
                                 
                                    <div class="mb-3">
                                        <label class="form-label">No KTP</label>
                                        <input type="text" class="form-control" name="noKtpPelanggan" 
                                        value="<?=$data['noKtpPelanggan']?>" placeholder="Masukkan No KTP Pelanggan">
                                    </div>
                                </div>
                            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-success" name="ubahPelanggan">Ubah</button>
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
                                <input type="hidden" name="idPelanggan" value="<?=$data['idPelanggan']?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda ingin menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-danger" name="hapusPelanggan">Hapus</button>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="action.php">
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">ID Pelanggan</label>
                                <input type="text" class="form-control" name="idPelanggan" placeholder="Masukkan ID Pelanggan">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="namaPelanggan" placeholder="Masukkan Nama Pelanggan">
                            </div>
                     
                            <div class="mb-2">
                                <label class="form-label">Alamat</label>
                                <input type="textarea" class="form-control" name="alamatPelanggan" placeholder="Masukkan Alamat Pelanggan">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="radio" name="jkPelanggan"  value="Laki-Laki" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                                </div>
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="radio" name="jkPelanggan" value="Perempuan" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">Perempuan </label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">No HP</label>
                                <input type="text" class="form-control" name="noHpPelanggan" placeholder="Masukkan No HP Pelanggan">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">No KTP</label>
                                <input type="text" class="form-control" name="noKtpPelanggan" placeholder="Masukkan No KTP Pelanggan">
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                            <button href="action.php" type="submit" class="btn btn-success" name="simpanPelanggan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal tambah -->

    </div>
</div>

<?php include "includes/footer.php"?>
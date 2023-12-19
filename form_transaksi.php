<?php
    include "scripts/config.php";
    include "includes/header.php";
?>

<div class="container">
    <div class="mt-3">
        <h1 class="text-center">Data Transaksi</h1>
        <h4 class="text-center">Penyewaan Mobil Di PT JEKUY</h4>
    </div>
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="index.php" style="color: #ffffff;">Beranda</a></li>
                <li class="breadcrumb-item" aria-current="page" style="color: #ffffff;">Transaksi</li>
            </ol>
        </nav>
    </div>
    <div class="card-body">

        <button href="form_pelanggan.php" type="button" class="btn btn-success bg-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah"> [+] </button>

        <table class="table table-bordered table-striped table-hover text-center">
            <tr>
                <th>Nomor</th>
                <th>ID Transaksi</th>
                <th>ID Pelanggan</th>
                <th>ID Mobil</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>ID Tarif</th>
                <th>Total Tarif</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no=1;
            $tampil=mysqli_query($db,"SELECT * FROM transaksi");
            while($data = mysqli_fetch_array($tampil)) :
            ?> 
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['idTransaksi']?></td>
                    <td><?= $data['idPelanggan']?></td>
                    <td><?= $data['idMobil']?></td>
                    <td><?= $data['tglSewa']?></td>
                    <td><?= $data['tglKembali']?></td>
                    <td><?= $data['idTarif']?></td>
                    <td><?= $data['totalTarif']?></td>
                    <td><?= $data['keterangan']?></td>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Transaksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="action.php">
                                <input type="hidden" name="idTransaksi" value="<?=$data['idTransaksi']?>">
                                
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">ID Transaksi</label>
                                        <input type="text" class="form-control" name="idTransaksi" 
                                        value="<?=$data['idTransaksi']?>" placeholder="Masukkan ID Transaksi">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">ID Pelanggan</label>
                                        <select name="idPelanggan" class="form-control">
                                             <option selected value="<?=$data['idPelanggan']?>" readonly><?=$data['idPelanggan']?></option>
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM `pelanggan`");
                                                while ($isi = mysqli_fetch_assoc($query)) {
                                                    print_r("<option value=\"".$isi['idPelanggan']."\">".$isi['idPelanggan']." (".$isi['namaPelanggan'].")"."</option> ");
                                                }
                                            ?>                               
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">ID Mobil</label>
                                        <select name="idMobil" class="form-control">
                                         <option selected value="<?=$data['idMobil']?>" readonly><?=$data['idMobil']?></option>
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM `jenismobil`");
                                                while ($isi = mysqli_fetch_assoc($query)) {
                                                    print_r("<option value=\"".$isi['idMobil']."\">".$isi['merkMobil']." (".$isi['warnaMobil'].", ".$isi['tahunMobil'].")"."</option> ");
                                                }
                                            ?>                               
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Sewa</label>
                                        <input type="date" class="form-control" name="tglSewa" 
                                        value="<?=$data['tglSewa']?>" placeholder="Masukkan Tanggal Sewa Transaksi">
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" name="tglKembali" 
                                        value="<?=$data['tglKembali']?>" placeholder="Masukkan Tanggal Kembali Transaksi">
                                    </div>
                                 
                                    <div class="mb-3">
                                        <label class="form-label">ID Tarif</label>
                                        <select name="idTarif" class="form-control">
                                            <option selected value="<?=$data['idTarif']?>" readonly><?=$data['idTarif']?></option>
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM `tarif`");
                                                while ($isi = mysqli_fetch_assoc($query)) {
                                                    print_r("<option value=\"".$isi['idTarif']."\">".$isi['idTarif']." (Waktu: ".$isi['waktuSewa'].", Harga: ".$isi['totalTarif'].")"."</option> ");
                                                }
                                            ?>                               
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Total Tarif</label>
                                        <input type="text" class="form-control" name="totalTarif" 
                                        value="<?=$data['totalTarif']?>" placeholder="Masukkan Total Tarif Transaksi">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" 
                                        value="<?=$data['keterangan']?>" placeholder="Masukkan Keterangan Transaksi">
                                    </div>
                                </div>
                            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-success" name="ubahTransaksi">Ubah</button>
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
                                <input type="hidden" name="idTransaksi" value="<?=$data['idTransaksi']?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda ingin menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                                    <button href="action.php" type="submit" class="btn btn-danger" name="hapusTransaksi">Hapus</button>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="action.php">
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">ID Transaksi</label>
                                <input type="text" class="form-control" name="idTransaksi" placeholder="Masukkan ID Transaksi">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">ID Pelanggan</label>
                                <select name="idPelanggan" class="form-control">
                                    <option selected disabled>-- Pilih Pelanggan --</option>
                                    <?php 
                                        $query = mysqli_query($db,"SELECT * FROM `pelanggan`");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            print_r("<option value=\"".$data['idPelanggan']."\">".$data['idPelanggan']." (".$data['namaPelanggan'].")"."</option> ");
                                        }
                                    ?>                               
                                </select>
                            </div>
                     
                            <div class="mb-2">
                                <label class="form-label">ID Mobil</label>
                                <select name="idMobil" class="form-control">
                                    <option selected disabled>-- Pilih Mobil --</option>
                                    <?php 
                                        $query = mysqli_query($db,"SELECT * FROM `jenismobil`");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            print_r("<option value=\"".$data['idMobil']."\">".$data['merkMobil']." (".$data['warnaMobil'].", ".$data['tahunMobil'].")"."</option> ");
                                        }
                                    ?>                               
                                </select>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Tanggal Sewa</label>
                                <input type="date" class="form-control" name="tglSewa" placeholder="Masukkan Tanggal Sewa Mobil">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tglKembali" placeholder="Masukkan Tanggal Kembali Mobil">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">ID Tarif</label>
                                <select name="idTarif" class="form-control">
                                    <option selected disabled>-- Pilih Tarif --</option>
                                    <?php 
                                        $query = mysqli_query($db,"SELECT * FROM `tarif`");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            print_r("<option value=\"".$data['idTarif']."\">".$data['idTarif']." (Waktu: ".$data['waktuSewa'].", Harga: ".$data['totalTarif'].")"."</option> ");
                                        }
                                    ?>                               
                                </select>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Total Tarif</label>
                                <input type="text" class="form-control" name="totalTarif" placeholder="Masukkan Total Tarif Transaksi">
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Transaksi">
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border border-dark" data-bs-dismiss="modal">Batal</button>
                            <button href="action.php" type="submit" class="btn btn-success" name="simpanTransaksi">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal tambah -->

    </div>
</div>

<?php include "includes/footer.php"?>
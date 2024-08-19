<?php
    // Koneksi Database
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "dbcrud2022";

    // Buat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database);
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Jika tombol simpan di klik
    if (isset($_POST['bsimpan'])) {
        // Data akan disimpan baru 
        $kode = mysqli_real_escape_string($koneksi, $_POST['tkode']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['tnama']);
        $asal = mysqli_real_escape_string($koneksi, $_POST['tasal']);
        $jumlah = mysqli_real_escape_string($koneksi, $_POST['tjumlah']);
        $satuan = mysqli_real_escape_string($koneksi, $_POST['tsatuan']);
        $tanggal_diterima = mysqli_real_escape_string($koneksi, $_POST['ttanggal_diterima']);
        $penerima = mysqli_real_escape_string($koneksi, $_POST['tpenerima']);

        $simpan = mysqli_query($koneksi, "INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima, penerima)
                                          VALUES ('$kode', '$nama', '$asal', '$jumlah', '$satuan', '$tanggal_diterima', '$penerima')");
        
        // Uji jika simpan data sukses 
        if ($simpan) {
            echo "<script>
                    alert('Simpan Data Sukses!');
                    window.location='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan Data Gagal: " . mysqli_error($koneksi) . "');
                    window.location='index.php';
                  </script>";
        }
    }

    // Deklarasi Variabel untuk menampung data yang akan di edit
    $vkode = "";
    $vnama = "";
    $vasal = "";
    $vjumlah = "";
    $vsatuan = "";
    $vtanggal_diterima = "";
    $vpenerima = "";

    // Pengujian jika tombol edit atau hapus di klik
    if (isset($_GET['hal'])) {
        // Pengujian jika edit data 
        if ($_GET['hal'] == "edit") {
            // Tampilkan data yang akan di edit 
            $id_barang = mysqli_real_escape_string($koneksi, $_GET['id']);
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang = '$id_barang'");
            $data = mysqli_fetch_assoc($tampil);
            if ($data) {
                // Jika data ditemukan, maka data ditampung ke dalam variabel
                $vkode = $data['kode'];
                $vnama = $data['nama'];
                $vasal = $data['asal'];
                $vjumlah = $data['jumlah'];
                $vsatuan = $data['satuan'];
                $vtanggal_diterima = $data['tanggal_diterima'];
                $vpenerima = $data['penerima'];
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP & MySQL + Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- awal container -->
    <div class="container">
        <h3 class="text-center">Data Inventaris</h3>
        <h3 class="text-center">Kantor Ngodingpintar</h3>
        <!-- awal row -->
        <div class="row">
            <!-- awal col -->
            <div class="col-md-8 mx-auto">
                <!-- awal card -->
                <div class="card">
                    <div class="card-header bg-info text-light">
                        Form Input Data Barang
                    </div>
                    <div class="card-body">
                        <!-- awal form -->
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" name="tkode" class="form-control" placeholder="Masukkan Kode Barang" value="<?= htmlspecialchars($vkode) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="tnama" class="form-control" placeholder="Masukkan Nama" value="<?= htmlspecialchars($vnama) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penerima</label>
                                <input type="text" name="tpenerima" class="form-control" placeholder="Masukkan Penerima" value="<?= htmlspecialchars($vpenerima) ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Asal Barang</label>
                                <select class="form-select" name="tasal">
                                    <option value="">-Pilih-</option>
                                    <option value="Pembelian" <?= $vasal == 'Pembelian' ? 'selected' : '' ?>>Pembelian</option>
                                    <option value="Hibah" <?= $vasal == 'Hibah' ? 'selected' : '' ?>>Hibah</option>
                                    <option value="Bantuan" <?= $vasal == 'Bantuan' ? 'selected' : '' ?>>Bantuan</option>
                                    <option value="Sumbangan" <?= $vasal == 'Sumbangan' ? 'selected' : '' ?>>Sumbangan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="tjumlah" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?= htmlspecialchars($vjumlah) ?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Satuan</label>
                                        <select class="form-select" name="tsatuan">
                                            <option value="">-Pilih-</option>
                                            <option value="Unit" <?= $vsatuan == 'Unit' ? 'selected' : '' ?>>Unit</option>
                                            <option value="Kotak" <?= $vsatuan == 'Kotak' ? 'selected' : '' ?>>Kotak</option>
                                            <option value="Pcs" <?= $vsatuan == 'Pcs' ? 'selected' : '' ?>>Pcs</option>
                                            <option value="Pak" <?= $vsatuan == 'Pak' ? 'selected' : '' ?>>Pak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Diterima</label>
                                        <input type="date" name="ttanggal_diterima" class="form-control" placeholder="Masukkan Tanggal Diterima" value="<?= htmlspecialchars($vtanggal_diterima) ?>">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <hr>
                                    <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                                    <button class="btn btn-danger" name="bkosongkan" type="reset">Kosongkan</button>
                                </div>
                            </div>
                        </form>
                        <!-- akhir form -->
                    </div>
                    <div class="card-footer bg-info">
                    </div>
                </div>
                <!-- akhir card -->
            </div>
            <!-- akhir col -->
        </div>
        <!-- akhir row -->

        <!-- awal card -->
        <div class="card mt-3">
            <div class="card-header bg-info text-light">
                Data Barang
            </div>
            <div class="card-body">
                <div class="col-md-8 mx-auto">
                    <form method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="tcari" class="form-control" placeholder="Masukkan Kata Kunci!">
                            <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
                            <button class="btn btn-danger" name="breset" type="submit">Reset</button>
                        </div>
                    </form>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Penerima</th>
                        <th>Asal Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Diterima</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        // Persiapan menampilkan data
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang ORDER BY id_barang DESC");
                        while ($data = mysqli_fetch_assoc($tampil)) :
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($data['kode']) ?></td>
                        <td><?= htmlspecialchars($data['nama']) ?></td>
                        <td><?= htmlspecialchars($data['penerima']) ?></td>
                        <td><?= htmlspecialchars($data['asal']) ?></td>
                        <td><?= htmlspecialchars($data['jumlah']) ?> <?= htmlspecialchars($data['satuan']) ?></td>
                        <td><?= htmlspecialchars($data['tanggal_diterima']) ?></td>
                        <td>
                            <a href="index.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?hal=hapus&id=<?= $data['id_barang'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                    <?php endwhile; ?>
                </table>
            </div>
            <div class="card-footer bg-info">
            </div>
        </div>
        <!-- akhir card -->
    </div>
    <!-- akhir container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once "Smartphone.php";
session_start();
 
/* Hapus session lama sekali */
if (isset($_GET['reset_session'])) {
    session_destroy();
    header("Location: Index.php");
    exit;
}
 
/* Data awal */
function dataAwal()
{
    return [
        new Smartphone(
            "SP001", "Samsung A55", 5999000, "samsung.jpg",
            "Samsung", "1 Tahun", 25, 8, 256, 50
        ),
 
        new Smartphone(
            "SP002", "iPhone 15", 12999000, "iphone.jpg",
            "Apple", "1 Tahun", 20, 6, 128, 48
        ),
 
        new Smartphone(
            "SP003", "Redmi Note 13", 2999000, "redmi.jpg",
            "Xiaomi", "1 Tahun", 33, 8, 256, 108
        ),
 
        new Smartphone(
            "SP004", "OPPO Reno 13", 5999000, "oppo_reno13.jpg",
            "OPPO", "1 Tahun", 25, 12, 256, 50
        ),
 
        new Smartphone(
            "SP005", "Vivo V30", 6299000, "vivov30.jpg",
            "Vivo", "1 Tahun", 30, 12, 256, 50
        )
    ];
}
 
 
/* Jika belum ada data */
if (!isset($_SESSION['daftar'])) {
    $_SESSION['daftar'] = dataAwal();
}
 
 
/* Upload foto */
function uploadFoto($file)
{
    if (!$file || $file['error'] != 0) {
        return "";
    }
 
    if (!is_dir("images")) {
        mkdir("images", 0777, true);
    }
 
    $ext = strtolower(
        pathinfo($file['name'], PATHINFO_EXTENSION)
    );
 
    if (!in_array($ext, [
        "jpg",
        "jpeg",
        "png",
        "webp"
    ])) {
        return "";
    }
 
    $nama = uniqid() . "." . $ext;
 
    move_uploaded_file(
        $file['tmp_name'],
        "images/" . $nama
    );
 
    return $nama;
}
 
 
/* Reset ke data awal */
if (isset($_POST['reset'])) {
 
    $_SESSION['daftar'] = dataAwal();
 
    header("Location: Index.php");
    exit;
}
 
 
/* Tambah data */
$errors = [];
$old = [];
 
if (isset($_POST['tambah'])) {
 
    $kode = trim($_POST['kode'] ?? "");
    $nama = trim($_POST['nama'] ?? "");
    $harga = (int)($_POST['harga'] ?? 0);
 
    $merek = trim($_POST['merek'] ?? "");
    $garansi = trim($_POST['garansi'] ?? "");
    $daya = (int)($_POST['daya'] ?? 0);
 
    $ram = (int)($_POST['ram'] ?? 0);
    $storage = (int)($_POST['storage'] ?? 0);
    $kamera = (int)($_POST['kamera'] ?? 0);
 
    /* Simpan input untuk ditampilkan lagi jika ada error */
    $old = $_POST;
 
    /* Validasi wajib isi */
    if ($kode === "") $errors[] = "Kode Produk wajib diisi.";
    if ($nama === "") $errors[] = "Nama Produk wajib diisi.";
    if ($harga <= 0) $errors[] = "Harga wajib diisi (lebih dari 0).";
    if ($merek === "") $errors[] = "Merek wajib diisi.";
    if ($garansi === "") $errors[] = "Garansi wajib diisi.";
    if ($daya <= 0) $errors[] = "Daya wajib diisi (lebih dari 0).";
    if ($ram <= 0) $errors[] = "RAM wajib diisi (lebih dari 0).";
    if ($storage <= 0) $errors[] = "Storage wajib diisi (lebih dari 0).";
    if ($kamera <= 0) $errors[] = "Kamera wajib diisi (lebih dari 0).";
 
    /* Validasi kode tidak boleh sama (duplikat) */
    if ($kode !== "") {
        foreach ($_SESSION['daftar'] as $item) {
            if (strcasecmp($item->getKode(), $kode) === 0) {
                $errors[] = "Kode Produk \"$kode\" sudah digunakan. Gunakan kode lain.";
                break;
            }
        }
    }
 
    /* Hanya simpan jika tidak ada error */
    if (empty($errors)) {
 
        /* Foto */
        $foto = uploadFoto(
            $_FILES['foto_produk'] ?? null
        );
 
        /* Buat object Smartphone */
        $data = new Smartphone(
            $kode,
            $nama,
            $harga,
            $foto,
            $merek,
            $garansi,
            $daya,
            $ram,
            $storage,
            $kamera
        );
 
        /* Masukkan ke session */
        $_SESSION['daftar'][] = $data;
 
        header("Location: Index.php");
        exit;
    }
}
?>
 
<!DOCTYPE html>
<html lang="id">
 
<head>
 
    <meta charset="UTF-8">
 
    <title>TechStore</title>
 
    <style>
 
        body {
            font-family: Arial;
            background: #f2f2f2;
            margin: 0;
        }
 
        header {
            background: #263746;
            color: white;
            padding: 20px 40px;
        }
 
        main {
            width: 92%;
            margin: 20px auto;
        }
 
        .box {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
 
        input {
            width: 95%;
            padding: 8px;
            margin: 5px 0 12px;
        }
 
        button {
            padding: 8px 14px;
            border: 0;
            border-radius: 5px;
            background: #263746;
            color: white;
            cursor: pointer;
        }
 
        .reset {
            background: #777;
        }
 
        table {
            width: 100%;
            border-collapse: collapse;
        }
 
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
 
        th {
            background: #263746;
            color: white;
        }
 
        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
 
    </style>
 
</head>
 
<body>
 
<header>
 
    <h1>TechStore</h1>
 
    <p>
        Manajemen Produk Smartphone
    </p>
 
</header>
 
 
<main>
 
 
<!-- FORM TAMBAH -->
 
<div class="box">
 
    <h2>Tambah Smartphone</h2>
 
    <p>
        Semua data wajib diisi (kecuali foto). Kode Produk tidak boleh sama dengan yang sudah ada.
    </p>
 
    <?php if (!empty($errors)): ?>
        <div style="background:#fdecea; color:#b3261e; border:1px solid #f5c2c0; border-radius:6px; padding:10px 14px; margin-bottom:14px;">
            <ul style="margin:0; padding-left:18px;">
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
 
    <form
        method="POST"
        enctype="multipart/form-data"
    >
 
        <label>Kode Produk</label><br>
 
        <input
            type="text"
            name="kode"
            required
            value="<?= htmlspecialchars($old['kode'] ?? '') ?>"
        >
 
 
        <label>Nama Produk</label><br>
 
        <input
            type="text"
            name="nama"
            required
            value="<?= htmlspecialchars($old['nama'] ?? '') ?>"
        >
 
 
        <label>Harga</label><br>
 
        <input
            type="number"
            name="harga"
            min="1"
            required
            value="<?= htmlspecialchars($old['harga'] ?? '') ?>"
        >
 
 
        <label>Foto Produk</label><br>
 
        <input
            type="file"
            name="foto_produk"
            accept=".jpg,.jpeg,.png,.webp"
        >
 
 
        <label>Merek</label><br>
 
        <input
            type="text"
            name="merek"
            required
            value="<?= htmlspecialchars($old['merek'] ?? '') ?>"
        >
 
 
        <label>Garansi</label><br>
 
        <input
            type="text"
            name="garansi"
            required
            value="<?= htmlspecialchars($old['garansi'] ?? '') ?>"
        >
 
 
        <label>Daya</label><br>
 
        <input
            type="number"
            name="daya"
            min="1"
            required
            value="<?= htmlspecialchars($old['daya'] ?? '') ?>"
        >
 
 
        <label>RAM</label><br>
 
        <input
            type="number"
            name="ram"
            min="1"
            required
            value="<?= htmlspecialchars($old['ram'] ?? '') ?>"
        >
 
 
        <label>Storage</label><br>
 
        <input
            type="number"
            name="storage"
            min="1"
            required
            value="<?= htmlspecialchars($old['storage'] ?? '') ?>"
        >
 
 
        <label>Kamera</label><br>
 
        <input
            type="number"
            name="kamera"
            min="1"
            required
            value="<?= htmlspecialchars($old['kamera'] ?? '') ?>"
        >
 
        <br>
 
        <button
            type="submit"
            name="tambah"
        >
            + Tambah
        </button>
 
    </form>
 
 
    <br>
 
 
    <!-- RESET -->
 
    <form method="POST">
 
        <button
            type="submit"
            name="reset"
            class="reset"
        >
            Reset ke Data Awal
        </button>
 
    </form>
 
</div>
 
 
<!-- TABEL -->
 
<div class="box">
 
    <h2>Daftar Smartphone</h2>
 
    <table>
 
        <tr>
            <th>Foto</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Merek</th>
            <th>Garansi</th>
            <th>Daya</th>
            <th>RAM</th>
            <th>Storage</th>
            <th>Kamera</th>
        </tr>
 
 
        <?php foreach ($_SESSION['daftar'] as $s): ?>
 
        <tr>
 
            <td>
 
                <?php if ($s->getFotoProduk()): ?>
 
                    <img
                        src="images/<?= htmlspecialchars(
                            $s->getFotoProduk()
                        ) ?>"
                    >
 
                <?php else: ?>
 
                    -
 
                <?php endif; ?>
 
            </td>
 
 
            <td>
                <?= htmlspecialchars(
                    $s->getKode()
                ) ?>
            </td>
 
 
            <td>
                <?= htmlspecialchars(
                    $s->getNama()
                ) ?>
            </td>
 
 
            <td>
                Rp <?= number_format(
                    $s->getHarga(),
                    0,
                    ',',
                    '.'
                ) ?>
            </td>
 
 
            <td>
                <?= htmlspecialchars(
                    $s->getMerek()
                ) ?>
            </td>
 
 
            <td>
                <?= htmlspecialchars(
                    $s->getGaransi()
                ) ?>
            </td>
 
 
            <td>
                <?= $s->getDaya() ?> W
            </td>
 
 
            <td>
                <?= $s->getRam() ?> GB
            </td>
 
 
            <td>
                <?= $s->getPenyimpanan() ?> GB
            </td>
 
 
            <td>
                <?= $s->getKamera() ?> MP
            </td>
 
        </tr>
 
        <?php endforeach; ?>
 
    </table>
 
</div>
 
</main>
 
</body>
 
</html>
 
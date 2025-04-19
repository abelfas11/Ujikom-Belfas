<?php
$id = $_GET['id'];

// Cek apakah ada buku yang memakai kategori ini
$cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_kategori = $id");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Gagal hapus! Masih ada buku yang menggunakan kategori ini.'); location.href='index.php?page=kategori';</script>";
} else {
    mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = $id");
    echo "<script>location.href='index.php?page=kategori';</script>";
}
?>

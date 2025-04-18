<?php
$id = $_GET['id'];

// Cek dulu apakah buku masih dipinjam
$cek = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_buku = $id");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Gagal hapus! Buku sedang dipinjam.'); location.href='index.php?page=buku';</script>";
} else {
    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = $id");
    echo "<script>location.href='index.php?page=buku';</script>";
}
?>

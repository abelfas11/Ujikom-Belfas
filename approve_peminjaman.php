<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'dipinjam' WHERE id_peminjaman = $id");
echo "<script>alert('Peminjaman disetujui!'); location.href='?page=peminjaman_konfirmasi';</script>";
?>

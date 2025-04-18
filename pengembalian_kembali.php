<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'dikembalikan' WHERE id_peminjaman = $id");

    if($query){
        echo "<script>alert('Buku berhasil dikembalikan!'); location.href='?page=pengembalian';</script>";
    } else {
        echo "<script>alert('Gagal mengembalikan buku!'); location.href='?page=pengembalian';</script>";
    }
?>

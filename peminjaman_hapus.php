<?php
$id = $_GET['id'];
$query =  mysqli_query($koneksi, "DELETE FROM peminjaman where id_peminjaman = $id");
?>

<script>
    location.href = "index.php?page=peminjaman";
</script>
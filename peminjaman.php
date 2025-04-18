<h1 class="mt-4">Peminjaman</h1>
<a href="?page=peminjaman_tambah" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah Peminjaman
</a>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "
                        SELECT * FROM peminjaman 
                        LEFT JOIN user ON user.id_user = peminjaman.id_user 
                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                        WHERE peminjaman.id_user = " . $_SESSION['user']['id_user']
                    );

                    while($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>
                                <?php if (!empty($data['sampul'])) { ?>
                                    <img src="uploads/<?php echo $data['sampul']; ?>" alt="Sampul" width="60" style="margin-right: 10px; border-radius: 4px;">
                                <?php } ?>
                                <?php echo $data['judul']; ?>
                            </td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td>
                                <?php 
                                    if ($data['status_peminjaman'] == 'menunggu') {
                                        echo '<span class="badge bg-warning text-dark">Menunggu persetujuan admin</span>';
                                    } elseif ($data['status_peminjaman'] == 'dipinjam') {
                                        echo '<span class="badge bg-success">Dipinjam</span>';
                                    } elseif ($data['status_peminjaman'] == 'dikembalikan') {
                                        echo '<span class="badge bg-info">Dikembalikan</span>';
                                    } elseif ($data['status_peminjaman'] == 'ditolak') {
                                        echo '<span class="badge bg-danger">Ditolak</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php if ($data['status_peminjaman'] == 'menunggu') { ?>
                                    <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-primary btn-sm rounded-1">Change</a>
                                    <a href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-sm rounded-1">Delete</a>
                                <?php } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #E1F5FE, #FFEBEE);
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
        height: 100vh;
    }

    .badge {
        padding: 6px 12px;
        font-size: 0.9rem;
    }

    td img {
        vertical-align: middle;
    }
</style>

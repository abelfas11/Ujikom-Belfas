<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    include 'koneksi.php';

                    $id = intval($_GET['id']); // Sanitasi ID

                    if (isset($_POST['submit'])) {
                        $id_buku = intval($_POST['id_buku']);
                        $id_user = $_SESSION['user']['id_user'];
                        $ulasan = mysqli_real_escape_string($koneksi, $_POST['ulasan']);
                        $rating = intval($_POST['rating']);

                        // Validasi: apakah id_buku valid?
                        $cek_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id_buku");
                        if (mysqli_num_rows($cek_buku) > 0) {
                            $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku', ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id");

                            if ($query) {
                                echo '<div class="alert alert-success">Ubah data berhasil.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Ubah data gagal: ' . mysqli_error($koneksi) . '</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">ID Buku tidak valid.</div>';
                        }
                    }

                    // Ambil data ulasan untuk diedit
                    $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan=$id");
                    $data = mysqli_fetch_array($query);
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select class="form-select w-50" name="id_buku" required>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    $selected = ($data['id_buku'] == $buku['id_buku']) ? 'selected' : '';
                                    echo "<option value='{$buku['id_buku']}' $selected>{$buku['judul']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Ulasan</div>
                        <div class="col-md-8">
                            <textarea name="ulasan" rows="5" class="form-control" required><?= htmlspecialchars($data['ulasan']); ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Rating</div>
                        <div class="col-md-8">
                            <select name="rating" class="form-select" required>
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    $selected = ($data['rating'] == $i) ? 'selected' : '';
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=ulasan" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </form>
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
</style>

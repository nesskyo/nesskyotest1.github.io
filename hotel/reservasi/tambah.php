<?php include '../config.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reservasi</title>
    <link rel="stylesheet" type="text/css" href="style_res.css">
</head>
<body>
    <div class="container">
        <h1>
            <button class="back-btn" onclick="window.history.back()" type="button">←</button>
            Tambah Reservasi Baru
        </h1>

        <form method="POST" class="single-column">
            <div class="form-group">
                <label for="tamu">Nama Tamu</label>
                <select name="tamu" id="tamu" required>
                    <option value="">-- Pilih Tamu --</option>
                    <?php
                    $tamu = mysqli_query($conn,"SELECT * FROM tamu ORDER BY nama ASC");
                    while($t = mysqli_fetch_array($tamu)){
                        echo "<option value='$t[id_tamu]'>$t[nama]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="kamar">Nomor Kamar</label>
                <select name="kamar" id="kamar" required>
                    <option value="">-- Pilih Kamar --</option>
                    <?php
                    $kamar = mysqli_query($conn,"SELECT * FROM kamar ORDER BY nomor_kamar ASC");
                    while($k = mysqli_fetch_array($kamar)){
                        echo "<option value='$k[id_kamar]'>$k[nomor_kamar]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="in">Tanggal Check In</label>
                <input type="date" name="in" id="in" required>
            </div>

            <div class="form-group">
                <label for="out">Tanggal Check Out</label>
                <input type="date" name="out" id="out" required>
            </div>

            <div class="button-group">
                <button type="submit" name="simpan">✓ Simpan</button>
                <button type="reset" class="btn-secondary">✕ Reset</button>
            </div>
        </form>
    </div>

    <footer>
        © 2026 Hotel Management System
    </footer>
</body>
</html>

<?php
if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO reservasi(id_tamu,id_kamar,tgl_check_in,tgl_check_out)
    VALUES('$_POST[tamu]','$_POST[kamar]','$_POST[in]','$_POST[out]')");
    header("location:index.php");
}
?>
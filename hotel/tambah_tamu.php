<form method="POST">
    Nama: <input type="text" name="nama"><br>
    Email: <input type="text" name="email"><br>
    Telepon: <input type="text" name="telepon"><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
include 'config.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO tamu (nama, email, telepon)
    VALUES ('$_POST[nama]', '$_POST[email]', '$_POST[telepon]')");
    
    echo "Data berhasil disimpan!";
    
}
?>
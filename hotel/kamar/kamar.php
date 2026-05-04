<?php
include 'config.php';

$query = "SELECT kamar.*, tipe_kamar.nama_tipe 
          FROM kamar 
          JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe";

$result = mysqli_query($conn, $query);
?>

<h2>Data Kamar</h2>
<table border="1">
<tr>
    <th>No</th>
    <th>Nomor Kamar</th>
    <th>Tipe</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id_kamar'] ?></td>
    <td><?= $row['nomor_kamar'] ?></td>
    <td><?= $row['nama_tipe'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>
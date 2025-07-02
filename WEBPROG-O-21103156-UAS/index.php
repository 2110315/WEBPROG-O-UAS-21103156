<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catatan Harian</title>
    <link rel="stylesheet" href="asset/style_baru.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>Catatan Harian</h2>

<form method="POST">
    <input type="text" name="judul" placeholder="Judul" required>
    <input type="date" name="tanggal" required>
    <textarea name="isi" placeholder="Isi Catatan" required></textarea>
    <button type="submit">Simpan</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $isi = $_POST['isi'];
    $sql = "INSERT INTO catatan (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')";
    mysqli_query($conn, $sql);
}
?>

<input type="text" id="search" placeholder="Cari judul catatan...">

<table border="1">
    <tr><th>Judul</th><th>Tanggal</th><th>Isi</th><th>Aksi</th></tr>
    <tbody id="data-catatan">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM catatan ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['judul']}</td>";
        echo "<td>{$row['tanggal']}</td>";
        echo "<td>{$row['isi']}</td>";
        echo "<td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}'>Hapus</a>
        </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<script src="script.js"></script>
</body>
</html>
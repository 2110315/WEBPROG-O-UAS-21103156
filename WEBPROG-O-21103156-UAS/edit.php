<?php include 'db.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $isi = $_POST['isi'];
    $sql = "UPDATE catatan SET judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit;
}
$result = mysqli_query($conn, "SELECT * FROM catatan WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Catatan</title></head>
<body>
<h2>Edit Catatan</h2>
<form method="POST">
    <input type="text" name="judul" value="<?= $data['judul'] ?>" required>
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>
    <textarea name="isi" required><?= $data['isi'] ?></textarea>
    <button type="submit">Update</button>
</form>
</body>
</html>
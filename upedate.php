<?php
// update.php
// Form to update existing 

include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM mahasiwa WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "UPDATE mahasiwa SET nim='$nik', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Penduduk</title>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Penduduk</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $row['nik']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
            <input type="radio" id="laki" name="jenis_kelamin" value="L" <?php echo ($row['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> required>
            <label for="laki">Laki-laki</label>
            <input type="radio" id="perempuan" name="jenis_kelamin" value="P" <?php echo ($row['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> required>
            <label for="perempuan">Perempuan</label>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>


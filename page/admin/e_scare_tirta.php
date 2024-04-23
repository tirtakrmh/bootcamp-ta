<?php
include "../../conn.php";

$id_scare = $_POST['id_scare'];
$brand = $_POST['brand'];
$treatment_type = $_POST['treatment_type'];
$skin_type = $_POST['skin_type'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$category = $_POST['category'];

$qryid = mysqli_query($conn, "SELECT * FROM category WHERE categories='$category'");
$data = mysqli_fetch_assoc($qryid);
$id_category = $data['id_categories'];

$message = '';
$valid_file = true;
$max_size = 1024000;

if ($_FILES['image']['name']) {
    if (!$_FILES['image']['error']) {
        $new_file_name = strtolower($_FILES['image']['tmp_name']);
        if ($_FILES['image']['size'] > $max_size) {
            $valid_file = false;
            $message = 'Maaf, file terlalu besar. Max: 1MB';
        }
        $image_path = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($image_path);

        if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
            $valid_file = false;
            $message = "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #" . $extension;
        }

        if ($valid_file == true) {
            $rename_nama_file = date('YmdHis');
            $nama_file_baru = $rename_nama_file . '.' . $extension;

            mysqli_query($conn, "UPDATE scare SET brand='$brand',id_categories='$id_category',skin_type='$skin_type',treatment_type='$treatment_type',price='$price', image='$nama_file_baru', stock='$stock' WHERE id_scare='$id_scare'");

            move_uploaded_file($_FILES['image']['tmp_name'], '../../gambar/' . $nama_file_baru);
            header("location:index.php?page=scare_tirta");
        }
    } else {
        $message = 'Ooops! Your upload triggered the following error: ' . $_FILES['image']['error'];
    }
} else {
    // Jika tidak ada file yang diunggah, hanya lakukan update data tanpa memperbarui gambar
    mysqli_query($conn, "UPDATE scare SET brand='$brand',id_categories='$id_category',skin_type='$skin_type',treatment_type='$treatment_type',price='$price', stock='$stock' WHERE id_scare='$id_scare'");
    header("location:index.php?page=scare_tirta");
}
?>

<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
//terima data dari mobile
$nama = trim($data['nama']);
$umur = trim($data['umur']);
http_response_code(201);
if ($nama != '' and $umur != '') {
    $query = mysqli_query($koneksi, "insert into catatan(nama,umur) values('$nama','$umur')");
    $pesan = true;
} else {
    $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);

<?php
define('BASE_URL', '/pw2023_223040054/kuliah/tubes');

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040054_tubes') or die('KONEKSI KE DB GAGAL!');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {

    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();
  $id = $data['id'];
  $Nama = htmlspecialchars($data['Nama']);
  $Email = htmlspecialchars($data['Email']);
  $Password = htmlspecialchars($data['Password']);

  $query = "INSERT INTO
              pengguna
           VALUES (null,'$Nama','$Email', '$Password')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  $query = "DELETE FROM pengguna WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id = $data['id'];
  $Nama = htmlspecialchars($data['Nama']);
  $Email = htmlspecialchars($data['Email']);
  $Password = htmlspecialchars($data['Password']);

  $query = "UPDATE pengguna
             SET
             Nama = '$Nama',
             Email = '$Email',
             Password = '$Password'
             WHERE id = $id
             ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  die;
  echo "</pre>";
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === BASE_URL) ? 'active' : '';
}

# lab9web
# Modular
```
Nama  : M. Rizqy Al Rasyd
Nim   : 312410424
Kelas : TI.24.A3
```

# Buat data di phpmyadmin
![gambar](sql.png)

# Membuat home pada index.php
## Code index.php:
```
<?php 
require "config/app.php";
require "config/database.php";
?>
<link rel="stylesheet" href="assets/css/style.css">
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch($page){
    case 'home':
        include "views/home.php";
        break;

    case 'user/list':
        require "modules/user.php";
        user_list();
        break;

    case 'about':
        include "views/about.php";
        break;

    default:
        echo "404 Page Not Found";
}
?>
```
## Code header.php:
```
<!DOCTYPE html>
<html>
<head>
    <title>Modular Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<header>
    <h1>Sistem Modular PHP</h1>
    <nav>
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=user/list">User</a>
        <a href="index.php?page=about">About</a>
    </nav>
</header>
```
## Code footer.php
```
                <footer>
            <p>&copy; 2021, Informatika, Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```
### header dan footer dipisah untuk memudahkan jika terjadi error (example: jika header error tinggal perbaiki satu file saja yaitu headernya)
#### header:
![img](head.png)
#### footer:
![img](foot.png)

## Code user.php:
```
<?php

function user_list() {
    include "config/database.php";
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM users");

    include "views/user/list.php"; 
}
```
## Code app.php:
```
<?php

$base_url = "http://localhost/lab9_php_modular/";

$app_name = "Modular PHP App";

date_default_timezone_set("Asia/Jakarta");

function url($path = "") {
    global $base_url;
    return $base_url . $path;
}
```
## Code database.php:
```
<?php
$host = "localhost";
$user = "root";     
$pass = "";          
$db   = "latihan1"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
```
## Code list.php:
```
<?php include "views/header.php"; ?>

<h2>Daftar User</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Nama</th><th>Email</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include "views/footer.php"; ?>
```
## Code home.php:
```
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman Home</h2>
    <p>Halaman ini dibuat untuk menampilkan home dari suatu website.</p>
</div>

<?php require('footer.php'); ?>
```
## Code about.php
```
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman About</h2>
    <p>Halaman ini dibuat untuk menampilkan about dari suatu website.</p>
</div>

<?php require('footer.php'); ?>
```
## Output:
### home:
![img](home.png)
### user:
![img](user.png)
### about:
![img](about.png)



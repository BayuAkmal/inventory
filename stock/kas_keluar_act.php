<?php 
include '../dbconnect.php';
$saldo=$_POST['saldo']; // ini ID saldo nya
$qty=$_POST['qty'];
$tanggal=$_POST['tanggal'];
$penerima=$_POST['penerima'];
$ket=$_POST['ket'];

$dt=mysqli_query($conn,"select * from skas where idy='$saldo'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$qty;
$query1 = mysqli_query($conn,"update skas set jumlah='$sisa' where idy='$saldo'");

$query2 = mysqli_query($conn,"insert into skas_keluar (idy,tgl,jumlahkeluar,keterangan,penerima) values('$saldo','$tanggal','$qty','$ket', '$penerima')");

if($query1 && $query2){
    echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= kas_keluar.php'/>  ";
} else {
    echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= kas_keluar.php'/> ";
}


?>

<html>
<head>
  <title>Kas Keluar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
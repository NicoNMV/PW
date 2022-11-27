<?php 
include 'conexao.php';
$Registro = $_POST['txtRegistro'];
$Nome = $_POST['txtnome'];
$Cargo = $_POST['sltcargo'];
$Area = $_POST['sltarea'];
$Salario = $_POST['txtSalario'];
$Status = $_POST['rdbStatus'];

$update=$cn->query("UPDATE tbl_empregos set Nome = '$Nome', Cargo = '$Cargo', Area = '$Area', Salario = '$Salario', Status = '$Status' where Registro='$Registro'");
header('location: index.php');
?>
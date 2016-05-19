<?php

// Define variáveis de login;
$servername = "localhost";
$username = "root";
$password = "";
$database = "checkpoint_net_db";
// Cria conexão
$conn = mysqli_connect ($servername, $username, $password);
// Seleciona o banco de dados
mysqli_select_db ($conn, $database);
// Verifica se a conexão foi efetuada
if ($conn->connect_error) 
    die ("Connection failed: " . $conn->connect_error);
    
?>

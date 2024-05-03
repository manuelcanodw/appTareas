<?php

// Parámetros de las conexión
$serverName = "127.0.0.1";
$userName = "cief";
$password = "123456";
$dbName = "gestor_de_tareas";

// $link = "mysql:host=$serverName; port=3306; dbname=$dbName;";
// try {

// $conn = new PDO($link, $userName, $password);



$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($conn){
    echo "Conexión establecida";
}



// } catch (PDOException $e){
// print("Error: " . $e->getMessage());

// } catch (Exception $e) {
//     print("Error: " . $e->getMessage());



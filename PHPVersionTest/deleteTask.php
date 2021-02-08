<?php session_start(); 

$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
$id = $_GET['idTask'];

$req = $bdd->prepare('DELETE FROM task WHERE id = :id');
$req->execute(array(
    'id' => $id
));

header ('location: index.php');


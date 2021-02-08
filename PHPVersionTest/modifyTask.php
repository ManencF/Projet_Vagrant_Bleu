<?php session_start(); 

$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','');

$id = $_GET['idTask'];
$titre = $_GET['title'];
$descriptions = $_GET['descriptions'];

echo $id;
echo $titre;
echo $descriptions;

$req = $bdd->prepare('UPDATE task SET titre = :titre, descriptions = :descriptions WHERE id = :id');
$req->execute(array(
    'id' => $id,
    'titre' => $titre,
    'descriptions' => $descriptions
));

header ('location: index.php');


<?php session_start(); 

$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');

if(isset($_POST['mytitle2']))
{
    $title = $_POST['mytitle2'];
    $descriptions = $_POST['mydescription2'];
   
}

$req = $bdd->prepare('INSERT INTO task(titre, descriptions) VALUES(:title, :descriptions)');
$req->execute(array(
    'title' => $title,
    'descriptions' => $descriptions
));

header ('location: index.php');


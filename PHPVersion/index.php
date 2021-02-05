<?php session_start(); 

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    
?>
<script type="text/javascript" src="index.js"></script>
<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://kit.fontawesome.com/0697e8a177.js" crossorigin="anonymous"></script>
 </head>

<body>
    <form method="post" action="taskRegister.php">
        <div id="myDIV" class="header">
        <h2>Liste de taches</h2>
        <input type="text" id="mytitle" name="mytitle2" placeholder="Titre de la tache..." required>
        <button type="submit" id='btnSub' class="addBtn">Ajouter une tache</button>
        <input type="text" id="mydescription" name="mydescription2" placeholder="Description de la tache...">
        </div> 
    </form>
  
  <ul id="myUL">
    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
        $requete = "SELECT * FROM task";
        $resultat = $bdd->query($requete);

        echo '<li class="liGlobal">';
        while ($tuples = $resultat->fetch()) {
            echo '<li id="' . $tuples["id"] .'">
                        ' . $tuples["titre"] .' 
                        <i class="fas fa-pen modify" onClick="askConfirmModify('. $tuples["id"] .',\''. $tuples["titre"] .'\',\''. $tuples["descriptions"].'\')"></i> 
                        <i class="fas fa-times close" onClick="askConfirm('. $tuples["id"] .')"></i>
            ';
            if(!empty($tuples["descriptions"])){
                echo '<br><span class="spanDesc"><i class="far fa-hand-point-right"></i> ' . $tuples["descriptions"] .'</span>
                </li>';
            }
        }
        //askConfirmModify('. $tuples["id"] .',"'. $tuples["titre"] .'","'. $tuples["descriptions"].'")
        echo '</li>';
    ?>
  </ul>
</body>
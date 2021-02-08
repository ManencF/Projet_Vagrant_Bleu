<?php session_start(); 




//TestBddOk();
TestBddNonOk();
TestInsertionOk();


function TestBddOk(){
	echo "Test BDD OK : ";
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','');
		echo "OK";
		echo "<br>";
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

function TestBddNonOk(){
	echo "<br>";
	echo "Test BDD Non OK : ";
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
		echo "OK";
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

function TestInsertionOk(){
	echo "<br>";
	echo "Test Insertion OK : ";
	/*
	$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','');

	if(isset($_POST['mytitle2']))
	{
		$title = "titletest1";
		$descriptions = $_POST['descriptiontest1'];
	   
	}

	$req = $bdd->prepare('INSERT INTO task(titre, descriptions) VALUES(:title, :descriptions)');
	$req->execute(array(
		'title' => $title,
		'descriptions' => $descriptions
	));
	
	 $requete = "SELECT * FROM task where title=titletest1";
     $resultat = $bdd->query($requete);
	 echo $resultat;
	 
	 if(isset ($resultat)){
	 echo "OK" ;
	 }
	 else{
	echo "Insertion impossible";
	 }
	 */
}
?>
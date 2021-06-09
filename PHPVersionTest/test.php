<?php session_start(); 


TestBddOk();
TestBddNonOk();
TestInsertionOk();
TestInsertionNoOk();
TestModificationOk();
TestSuppressionOk();


function TestBddOk(){
	echo "Test BDD OK : ";
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
		echo "Connection OK : Bon Resultat !";
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

function TestBddNonOk(){
	echo "<br>";
	echo "Test BDD Non OK : ";
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','paslebonMDP');
		echo "Connection OK : Pas Bon Resultat...";
    }
    catch (Exception $e){
        echo 'Erreur : Bon Resultat !';
    }
	echo "<br>";
}

function TestInsertionOk(){
	echo "<br>";
	echo "Test Insertion OK : ";
	$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');

	$title = "titletest1";
	$descriptions = 'descriptiontest1';

	$req = $bdd->prepare('INSERT INTO task(titre, descriptions) VALUES(:title, :descriptions)');
	$req->execute(array(
		'title' => $title,
		'descriptions' => $descriptions
	));
	
	 $requete = "SELECT * FROM task where titre=:title";
	 $preparer = $bdd->prepare($requete);
	 $preparer->execute(array(':title'=>$title));
	 $resultat = $preparer->fetchAll(PDO::FETCH_ASSOC);
	 
	 if(empty($resultat)){
		echo "Insertion Non Effectuee : Pas Bon Resultat...";
	 }
	 else{
		echo "Insertion OK : Bon Resultat !" ;
	 }
}

function TestInsertionNoOk(){
	echo "<br>";
	echo "Test Insertion Non OK : ";
	$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');

	$title = null;
	$descriptions = 'descriptiontest2';

	$req = $bdd->prepare('INSERT INTO task(titre, descriptions) VALUES(:title, :descriptions)');
	$req->execute(array(
		'title' => $title,
		'descriptions' => $descriptions
	));

	 $requete = "SELECT * FROM task where descriptions=:descriptions";
	 $preparer = $bdd->prepare($requete);
	 $preparer->execute(array(':descriptions'=>$descriptions));
	 $resultat2 = $preparer->fetchAll(PDO::FETCH_ASSOC);
	 
	 if(empty($resultat2)){
		echo "Insertion Non Effectuee : Bon Resultat !";
	 }
	 else{
		echo "Insertion OK : Pas Bon Resultat...";
	 }
	 echo "<br>";
}

function TestModificationOk(){
	echo "<br>";
	echo "Test Modification OK : ";
	$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');

	$title = "titletest1";
	$descriptions = 'descriptiontest1';

	$requete = "SELECT * FROM task where titre=:title and descriptions=:descriptions";
	$preparer = $bdd->prepare($requete);
	$preparer->execute(array(
		':title'=>$title,
		':descriptions'=>$descriptions
	));

	$resultat3 = $preparer->fetchAll(PDO::FETCH_ASSOC);

	if(sizeOf($resultat3) > 0){
		$id =  $resultat3[0]['id'];
		$title = "titletest3";

		$req = $bdd->prepare('UPDATE task SET titre = :titre, descriptions = :descriptions2 WHERE id = :id');
		$req->execute(array(
			'id' => $id,
			'titre' => $title,
			'descriptions2' => $descriptions
		));

		$requete = "SELECT * FROM task where id = :id";
		$preparer = $bdd->prepare($requete);
		$preparer->execute(array(':id'=>$id));
		$resultat4 = $preparer->fetchAll(PDO::FETCH_ASSOC);
		
		if($resultat4[0]['titre'] === 'titletest3'){
			echo "Modification Effectuee : Bon Resultat !";
		}
		else{
			echo "Modification Non Effectuee : Pas Bon Resultat...";
		}
	}else{
		echo "Modification Non Effectuee : Pas Bon Resultat...";
	}
	echo "<br>";
}

	function TestSuppressionOk(){
		echo "<br>";
		echo "Test Suppression OK : ";
		$bdd = new PDO('mysql:host=localhost;dbname=mytodolist;','root','root');
	
		$title = "titletest3";
		$descriptions = 'descriptiontest1';
	
		$requete = "SELECT * FROM task where titre=:title and descriptions=:descriptions";
		$preparer = $bdd->prepare($requete);
		$preparer->execute(array(
			':title'=>$title,
			':descriptions'=>$descriptions
		));
	
		$resultat5 = $preparer->fetchAll(PDO::FETCH_ASSOC);
	
		if(sizeOf($resultat5) > 0){
			$id =  $resultat5[0]['id'];
	
			$req = $bdd->prepare('DELETE FROM task WHERE id = :id');
			$req->execute(array(
				'id' => $id
			));
	
			$requete = "SELECT * FROM task where id = :id";
			$preparer = $bdd->prepare($requete);
			$preparer->execute(array(':id'=>$id));
			$resultat6 = $preparer->fetchAll(PDO::FETCH_ASSOC);
			
			if(empty($resultat6)){
				echo "Suppression Effectuee : Bon Resultat !";
			}
			else{
				echo "Supression Non Effectuee : Pas Bon Resultat...";
			}
			echo "<br>";
		}else{
			echo "Supression Non Effectuee : Pas Bon Resultat...";
		}
	}
?>
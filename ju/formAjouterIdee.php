<?php

require_once('connection.php');
if (isset($_POST['titre'])){
	$titre=htmlentities($_POST['titre']); // recupère le titre dans une variable
	$description=htmlentities($_POST['description']); // récupère la description
	$image= $_FILES['image']; // recupère l'image
	echo '<pre>'. print_r($image,true).'</pre>';
	$destDir= 'uploadedImg/'; // indique le repertoire de destination
	$destinationpath= $destDir . $image['name']; // chemin de destination
	
	try 
	{
		
		require_once('localdata.php');// informations pour la connection a la bdd
		$maConnexion = new PDO($dns,$user,$mdp);// Connectio na la base de données
		$maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // aides d'erreurs

		$req="insert into idee(id_idee,title, text, path_image, note, id_employes)values(?,?,?,?,?,?);"; // requete sql
		$prep=$maConnexion->prepare($req); // preparation de la requete
		$prep->bindParam(1,$id_idee);
		$prep->bindParam(2,$titre); 
		$prep->bindParam(3,$description);//on execute les requetessql
		$prep->bindParam(4,$destinationpath);
		$prep->bindParam(5,$note);
		$prep->bindParam(6,$login);
		$prep->execute();
	}


	catch (PDOException $e)
	{
		print"erreur avec la bd!:".$e->getMessage()."<br/>"; // en cas d'erreur avec la bdd
		die();
	}

	if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
	{
		echo"upload reussi";
	}

	else // si ne marche par retourne :
	{
		echo "échec de l'upload";
	}

}


?>
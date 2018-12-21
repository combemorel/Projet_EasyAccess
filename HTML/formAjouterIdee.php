<?php
session_start();
require_once('localdata.php');
$login = $_SESSION['login'];

if (isset($_POST['titre']))
{

	$titre=htmlentities($_POST['titre']); // recupère le titre dans une variable
	$description=htmlentities($_POST['description']); // récupère la description
	$image= $_FILES['image']; // recupère l'image
	echo '<pre>'. print_r($image,true).'</pre>';
	$destDir= 'uploadedImg/'; // indique le repertoire de destination
	$destinationpath= $destDir . $image['name']; // chemin de destination
	
	

	$req="insert into idee(id_idee,title, text, path_image, note, id_employes)values(?,?,?,?,?,?);"; // requete sql
	$prep=$maConnexion->prepare($req); // preparation de la requete
	$prep->bindParam(1,$id_idee);
	$prep->bindParam(2,$titre); 
	$prep->bindParam(3,$description);//on execute les requetessql
	$prep->bindParam(4,$destinationpath);
	$prep->bindParam(5,$note);
	$prep->bindParam(6,$login);
	$prep->execute();
	




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
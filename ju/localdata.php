<?php 
$user = "root";
$mdp = "";
$serveur= "localhost";
$bd= "testpro";
$dns="mysql:host=$serveur;dbname=$bd;charset=utf8";

try 
	{
		
		$maConnexion = new PDO($dns,$user,$mdp);// Connectio na la base de données
		$maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // aides d'erreurs


	}
	catch (PDOException $e)
	{
		print"erreur avec la bd!:".$e->getMessage()."<br/>"; // en cas d'erreur avec la bdd
		die();
	}
 ?>
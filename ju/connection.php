<?php
session_start();
// $_SESSION['login'] = $_POST['login']; // login de la session est égale au login de la bdd donc de l'employé
// $_SESSION['mdp'] = $_POST['mdp']; // le mdp ""			""				""					""
require_once('localdata.php');

if (isset($_POST['login'])){

	$login = htmlentities($_POST['login']);
	$mdp = htmlentities([$_POST['mdp']]);

	try 
	{
		require_once('localdata.php');// informations pour la connection a la bdd
		$maConnexion = new PDO($dns,$user,$mdp);// Connectio na la base de données
		$maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // aides d'erreurs


	}
	catch (PDOException $e)
	{
		print"erreur avec la bd!:".$e->getMessage()."<br/>"; // en cas d'erreur avec la bdd
		die();
	}
	if (empty($login) OR empty($mdp))
	{
		print_r("veuillez saisir un login et un mot de passe");
	}
	else
	{
		$req= " select count(*) from employes where login ='".$login."' AND password ='".$mdp."'";
		$resultat=query($req)->fetch();
	
		if ($resultat['count(*)']==1)
		{
		header("");
		}

	}


}

 ?>
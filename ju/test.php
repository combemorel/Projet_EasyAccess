<?php 
// TABLEAU DE LA TABLE MATIERE //
echo "<table border=1>";
echo "<tr><th>id_idee</th><th>title</th><th>text</th><th>note</th><th>id_employes</th></tr>"; // créer le tableau
try{

	require_once('localData.php');
	$maConnexion = new PDO($dns,$user,$mdp);
	$req="select * from Idee";
	$resultat =$maConnexion->query($req);
	while ($Idee=$resultat->fetchObject())
	{
		echo "<tr><td>".$Idee->id_idee."</td>";
		echo "<td>".$Idee->title."</td>";
		echo "<td>".$Idee->text."</td>";
		echo "<td>".$Idee->note."</td>";
		echo "<td>".$Idee->id_employes."</td>";
		echo "</tr>";
	}
	echo "</table>";

}
catch (PDOException $e){
	print"erreur avec la bd!:".$e->getMessage()."<br/>";
	die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<?php

$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "contacts";

// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}
 //fichier de traitement des données
 //******************traitement des donnees de formulaire************************************ */

 if(isset($_POST['name-id']) && isset($_POST['email-id']) && isset($_POST['subject-id']) && isset($_POST['message']))
 {//tester si les element sont disponnible ou non
 	if(!empty($_POST['name-id']) && !empty($_POST['email-id']) && !empty($_POST['subject-id']) && !empty($_POST['message']))
 	{//tester si les elements sont vide ou non
 		$nom = htmlspecialchars($_POST['name-id']);//la fonction htmlspecialchars() est utilisé en raison de securite
 		$email = htmlspecialchars($_POST['email-id']);
 		$subject = htmlspecialchars($_POST['subject-id']);
 		$msg = htmlspecialchars($_POST['message']);
	
	$sql=$connexion->prepare("INSERT INTO contact(nom,email,sujet,contenu_messagee) VALUES(?,?,?,?)");
	$sql->bind_param("ssss",$nom,$email,$subject,$msg);
     if($sql->execute()){
		echo "<h1>votre message a bien ete enregistrer:</h1>";
		echo "<hr/>";
		echo 'bonjour '.$nom.' merci pour votre message nous vous contacterons le plus tot possible';
	 }
		
 }else echo 'Veuillez retourner sur le formulaire et remplir tous les champs !!';
 
}else//else de if qui teste si les element sont disponible
 echo 'Veuillez retourner sur le formulaire et remplir tous les champs !';
 ?>
 <br><br>
 <button class="btn btn-info" style="background-color: #e3722e"> <a style="text-decoration:none; color:white"href="index.php">retour sur la page</a> </button>
</div>

</body>
</html>

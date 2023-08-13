<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Le titre</title>
	<link rel="stylesheet" href="Modèle.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <nav class="navbar sticky-top navbar-expand-sm bg-dark" data-bs-theme="dark">
    <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
          <a class="nav-link" href="./index.html">Chapitre 2</a>
          <a class="nav-link" href="./chap3.html">Chapitre 3</a>
          <a class="nav-link" href="./wp" target="_blank">Chapitre 4</a>          
          <a class="nav-link" href="./chap5.html">Chapitre 5</a>
          <a class="nav-link" href="./chap6.html">Chapitre 6</a>
      </div>
    </div>
  </nav>
  
 <div class="container"> <br>

<?php 
	function nettoyer($x) {
		if ($x) {
			$x = trim($x) ;
			$x = stripslashes($x) ;
			$x = htmlspecialchars($x,  ENT_QUOTES) ;
		}
		return $x;}

	# Connexion
	$server = 'localhost' ;
	$user = 'id21047764_admin' ;
	$password = 'excellentpassword';
	$base = 'id21047764_chap5' ;

	$conn = new mysqli($server, $user, $password, $base) ;

	# Vérification de la connexion
    if ($conn->connect_errno) {
    die("Echec de la connection : " . $conn->connect_error); } 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nom = nettoyer($_POST['nom']) ;
		$prenom = nettoyer($_POST['prenom']) ;
		$email = nettoyer($_POST['email']) ;
		$sujet = nettoyer($_POST['sujet']) ;
		$msg = nettoyer($_POST['message']) ;
	
	    # Envoi de la requête
    	$sql = "INSERT INTO `commentaires` (`prenom`, `nom`, `sujet`, `date`, `email`, `message`) VALUES ('$prenom', '$nom', '$sujet', CURRENT_TIMESTAMP, '$email', '$msg');" ;
  		if ($conn->query($sql)) {
  		  # Lecture et restitution depuis la base
    		$id = $conn->insert_id ;
    		echo "<h2 class='pb-3'>Message envoyé !</h2>" ;
    		$result = $conn->query("SELECT * FROM commentaires WHERE msg_id = " . $id);
				$row = $result->fetch_assoc();
				echo "Merci ".$row['prenom'].", le commentaire est bien enregistré (n°".$row['msg_id'].")\n" ; }
  	    
  	  else echo "Erreur lors de l'envoi du message : " . $conn->error ; }

  	else echo "Pas d'envoi de formulaire" ;
?>

<p class="my-2"><a class="btn btn-secondary" href="javascript:history.go(-1)" role="button">Retour...</a></p>
 
</body>
</html>
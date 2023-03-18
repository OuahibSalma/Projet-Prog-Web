<?php 
 $host = "localhost"; // Nom d'hôte
 $user = "root"; // Nom d'utilisateur
 $pass = ""; // Mot de passe
 $db = "projet-prog-web"; // Nom de la base de données 
     $conn = mysqli_connect($host, $user, $pass, $db); 
 // Vérifier la connexion
 if (!$conn) {
     die("Connexion échouée : " . mysqli_connect_error());
 }

?>
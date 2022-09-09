<?php
   // Vérifier si le formulaire est soumis 
   if (isset( $_POST["valider"] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $nom = htmlspecialchars($_POST["nom"]); 
     $age = htmlspecialchars($_POST["age"]); 
     $adresse = htmlspecialchars($_POST['adresse']);
     // afficher le résultat
     echo "<h3>Informations récupérées en utilisant POST</h3>"; 
     echo "Nom : " . $nom . "Age : " . $age . " Adresse : " . $adresse; 
     exit;
  }
?>
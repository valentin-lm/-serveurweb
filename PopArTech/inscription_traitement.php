<?php
    require_once 'config.php'; // On inclu la connexion à la bdd

    
    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);


        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..

        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas
        if($row == 0){
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                         // si les deux mdp saisis sont bon

                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR'];
                             /*
                              ATTENTION
                              Verifiez bien que le champs token est présent dans votre table utilisateurs, il a été rajouté APRÈS la vidéo
                              le .sql est dispo pensez à l'importer !
                              ATTENTION
                            */
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, ip, token) VALUES(:pseudo, :email, :ip, :token)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64)) // a enlever a mettre la description
                            ));
                            // On redirige avec le message de succès
                            header('Refresh: 3; index.php?reg_err=success');
                            die();

                    }else{ header('Location: index.php?reg_err=email'); die();}
                }else{ header('Location: index.php?reg_err=email_length'); die();}
            }else{ header('Location: index.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: index.php?reg_err=already'); die();}
    }

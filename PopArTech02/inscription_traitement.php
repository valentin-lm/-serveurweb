<?php
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !isset($_POST['submit']))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);

        //message et image
        $msg = htmlspecialchars($_POST['message']);
        $images=$_FILES['profile']['name'];
        $tmp_dir=$_FILES['profile']['tmp_name'];
        $imageSize=$_FILES['profile']['size'];

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $to = "valentin.lemoual@gmail.com";
        $subject ="Demander d'inscription a PopArTech";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$pseudo.'<'.$email.'>' . "\r\n";

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..

        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas
        if($row == 0){
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if(strlen($pseudo) <= 500){

                            $ip = $_SERVER['REMOTE_ADDR'];

                            if (empty($_FILES['profile']['name'])){

                                $picprofilerand = rand(1,3);
                                $picProfile="pic0$picprofilerand.jpg";
                            }
                            else{

                                $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
                                $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                                $picProfile=rand(1000, 1000000).".".$imgExt;
                                $upload_dir='./images/';
                                move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
                            }
                            ?>
                                <h1 class="centre">En cour de traitement</h1>
                                <style>
                                .centre {
                                    text-align: center;
                                    margin-top: 20%;
                                    }
                                </style>
                            <?php

                            // On redirige avec le message de succès
                            header('Refresh: 3; index.php?reg_err=success');

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, ip, token, img, msg,confirme) VALUES(:pseudo, :email, :ip, :token, :img, :msg,:confirme)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'ip' => $ip,
                                'token' => bin2hex(openssl_random_pseudo_bytes(6)),
                                'img' => $picProfile,
                                'msg' => $msg,
                                'confirme' => "1")
                            );

                            $message="
                                <h1>Demander d'inscription a PopArTech</h1>
                                <table cellspacing='0' style='width: 50%;'>
                                    <tr>
                                        <th>Name :</th><td>$pseudo</td>
                                    </tr>
                                    <tr style='background-color: #e0e0e0;'>
                                        <th>Email :</th><td>$email</td>
                                    </tr>
                                    <tr>
                                        <th>images :</th><td><a href='http://127.0.0.1/PopArTech02/images/$picProfile'>ici</a></td>
                                    </tr>
                                    <tr>
                                        <th>Descriptin :</th><td>$msg</td>
                                    </tr>
                                </table>
                                <h4>Souhaitez-vous qu il soit afficher, si oui veuillez contacter l administrateur du site ?</h4>
                            </body>
                            </html>";

                            //envoie de mail
                            mail($to, $subject, $message, $headers) or die("Error!");
                            die();

                        }else{ header('Location: index.php?reg_err=msg_length'); die();}
                    }else{ header('Location: index.php?reg_err=email'); die();}
                }else{ header('Location: index.php?reg_err=email_length'); die();}
            }else{ header('Location: index.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: index.php?reg_err=already'); die();}
    }







<!DOCTYPE HTML>

<?php
							if(isset($_GET['reg_err']))
							{
								$err = htmlspecialchars($_GET['reg_err']);

								switch($err)
								{
									case 'success':
									?>
										<div class="alert alert-success">
											<strong>Succès</strong> inscription réussie !
										</div>
									<?php
									break;

									case 'email':
									?>
										<div class="alert alert-danger">
											<strong>Erreur</strong> email non valide
										</div>
									<?php
									break;

									case 'email_length':
									?>
										<div class="alert alert-danger">
											<strong>Erreur</strong> email trop long
										</div>
									<?php
									break;

									case 'pseudo_length':
									?>
										<div class="alert alert-danger">
											<strong>Erreur</strong> pseudo trop long
										</div>
									<?php
									case 'already':
									?>
										<div class="alert alert-danger">
											<strong>Erreur</strong> incription deja existant
										</div>
									<?php

								}
							}
							?>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>PopExpo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo">PopExpo</a>
					<nav id="nav">
						<a href="#three-Cosplay">Programme Cosplay</a>
						<a href="#three-jv">Programme Jeux Vidéo</a>
						<a href="#categorie">Concour et Trounoir</a>
						<a href="#footer">Inscription</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>PopExpo 2022</h1>
						<h3>Faisons un ensemble !</h3>
					</header>
				</div>
			</section>

		<!-- affichage base de donnée  -->
		<section id="three" class="wrapper ">
			<div class="inner">

					<h1>Programme Cosplay</h1>
					<div class="row">
						<div class="col">
							<img class="img-circle" src="images/pic01.jpg" alt="Pic 01" width="150" height="150">
							<h3>Areliann</h3>
							<p><a class="bouton-perso" href="#view-write-01" >Voir Plus</a></p>
								<a href="#three-Cosplay" id="view-write-01">
									<div class="text-descri">
										<h2>Kiuqsxn</h2>
										<p>
											Kiuqsxn, streameur ayant commencé par les jeux FPS, il découvre le monde du RP il y a quelques mois qui devient pour lui une vraie passion.
											<br><br>
											Particulièrement connu pour son role de Pablo sur le serveur GTA RP "21 Jump Click", on peut le retrouver aussi bien de jour comme de nuit sur GTA, New World, F1 ou encore Rainbow Six Siege.
										</p>
										<img class="img" src="images/pic01.jpg" alt="Pic 01">
									</div>
								</a>
			</div>
		</section>
		<section id="categorie">
			<div class="categorie-col">
				<div>
					<h1>Cosplay</h1>
					<h3>Description</h3>
					<p>
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque nesciunt enim consequatur molestiae? Ex, beatae aut. Eaque, quia ipsa quo adipisci fugiat fuga, corporis quam ut at aliquam dolorum nostrum?<br><br>
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid magni at necessitatibus tenetur nisi explicabo assumenda repellendus aut dolorum molestias, et quis, modi porro eveniet veritatis a aspernatur. Ea, distinctio! <br><br>
						Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium debitis earum consectetur minus tempore harum consequatur et. Quis voluptas non neque consectetur sit? Veritatis praesentium officiis saepe accusamus consectetur commodi?
						</p>
				</div>
				<div>
					<h1>Jeux Vidéo</h1>
					<h3>Description</h3>
					<p>
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque nesciunt enim consequatur molestiae? Ex, beatae aut. Eaque, quia ipsa quo adipisci fugiat fuga, corporis quam ut at aliquam dolorum nostrum?<br><br>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid magni at necessitatibus tenetur nisi explicabo assumenda repellendus aut dolorum molestias, et quis, modi porro eveniet veritatis a aspernatur. Ea, distinctio! <br><br>
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium debitis earum consectetur minus tempore harum consequatur et. Quis voluptas non neque consectetur sit? Veritatis praesentium officiis saepe accusamus consectetur commodi?
					</p>
				</div>
			  </div>
		</section>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>Inscription</h3>
					<form action="inscription_traitement.php" method="post">

						<div class="field half first">
							<label for="name">Pseudo</label>
							<input type="text" name="pseudo" id="name" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
						</div>
						<!-- a mettre dans la base de donnée image  -->

						<ul class="actions">
						<button type="submit" class="btn btn-primary btn-block">Inscription</button>
						</ul>

					</form>

					<div class="copyright">
						&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>

				</div>
			</footer>
		<!-- Scripts -->

<-->
	</body>
</html>
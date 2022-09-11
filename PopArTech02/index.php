<!DOCTYPE HTML>

<?php
	require_once 'config.php'; // On inclu la connexion à la bdd

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
				case 'msg_length':
				?>
					<div class="alert alert-danger">
						<strong>Erreur</strong>message trop long
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
					<a href="#three">Inscrit</a>
					<a href="#acticle">Acticle</a>
					<a href="#regle">Information et réglement</a>
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

	<!-- Acticle -->
		<section id="acticle">
			<div class="album py-5 bg-light">
				<div class="container">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
						<div class="col">
							<div class="card shadow-sm">
								<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
								<div class="card-body">
									<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
										</div>
										<small class="text-muted">9 mins</small>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<!-- Reglement -->
		<section id="regle">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2>titre 1</h2>
						<p>Desption reglement</p>
					</div>
					<div class="col">
						<h2>titre 2</h2>
						<p>Desption reglement</p>
					</div>
					<div class="col">
						<h2>titre 3</h2>
						<p>Desption reglement</p>
					</div>
				</div>
			</div>
		</section>

	<!-- affichage base de donnée  -->
		<section id="three" class="wrapper ">
			<div class="inner">
				<h1>Inscrit</h1>
				<div class="row">
					<?php
						$stmt=$bdd->prepare('SELECT * FROM utilisateurs ORDER BY id DESC');
						$stmt->execute();
						if($stmt->rowCount()>0)
						{
							while($row=$stmt->fetch(PDO::FETCH_ASSOC))
							{
								extract($row);
								?>
									<div class="col">
										<img class="img-circle" src="./images/<?php echo $row['img']?>" alt="Pic 01" width="150" height="150">
										<h3><?php echo $row['pseudo']?></h3>
										<p><a class="bouton-perso" href="#view-write-<?php echo $row['token']?>">Voir Plus</a></p>
											<a class="test"  id="view-write-<?php echo $row['token']?>" href="#three">
												<div class="text-descri"></div>
													<h2><?php echo $row['pseudo']?></h2>
													<p><?php echo $row['msg']?></p>
													<img class="img" src="./images/<?php echo $row['img']?>" alt="Pic 01">
												</div>
											</a>
									</div>
								<?php
							}
						}
					?>
				</div>
			</div>
		</section>

	<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<h3>Inscription</h3>
				<form action="inscription_traitement.php" method="post" enctype="multipart/form-data">
					<div class="field half first">
						<label for="name">Pseudo</label>
						<input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
					</div>
					<div class="field half">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
					</div>
					<div class="row">
						<div class="col-8">
							<label for="message">Description</label>
							<textarea type="message" name="message"  required="required" placeholder="..."></textarea>
						</div>
						<div class="col-4">
							<label for="file" class="label-file">Choisir une image</label>
							<input type="file" name="profile" accept=".jpg, .jpeg, .png">
						</div>
					</div>
					<ul class="actions">
						<button type="submit" class="btn btn-primary btn-block">Envoier</button>
					</ul>
				</form>

				<div class="copyright">
					<a>&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
				</div>
			</div>
		</footer>
	</body>
</html>
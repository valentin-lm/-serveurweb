<!DOCTYPE HTML>

<?php
require_once 'config.php'; // On inclu la connexion à la bdd

if (isset($_GET['reg_err'])) {
	$err = htmlspecialchars($_GET['reg_err']);

	switch ($err) {
		case 'success':
		?>
			<div class="alert alert-success">
				<strong>Succès</strong> inscription réussie !
			</div>
		<?php
			header('Refresh: 2; index.php');
			break;
		case 'msg_length':
		?>
			<div class="alert alert-danger">
				<strong>Erreur</strong>message trop long
			</div>
		<?php
			header('Refresh: 2; index.php');
			break;

		case 'email':
		?>
			<div class="alert alert-danger">
				<strong>Erreur</strong> email non valide
			</div>
		<?php
			header('Refresh: 2; index.php');
			break;

		case 'email_length':
		?>
			<div class="alert alert-danger">
				<strong>Erreur</strong> email trop long
			</div>
		<?php
			header('Refresh: 2; index.php');
			break;

		case 'pseudo_length':
		?>
			<div class="alert alert-danger">
				<strong>Erreur</strong> pseudo trop long
			</div>
		<?php
			header('Refresh: 2; index.php');
		case 'already':
		?>
			<div class="alert alert-danger">
				<strong>Erreur</strong> incription deja existant
			</div>
		<?php
			header('Refresh: 2; index.php');
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
	<link href="assets/stylesheet/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
	<!-- Header -->
	<header id="header">
		<div class="inner">
			<a href="index.php" class="logo">PopExpo</a>
			<nav id="nav">
				<a href="#three">Participent</a>
				<a href="#acticle">Acticle</a>
				<a href="#regle">Catégorie</a>
				<a href="#footer">Inscription</a>
				<!--<a href="#footer">Connection</a>-->
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
	<section id="acticle" class="inner-acticle" >
		<div class="album py-5">
			<div class="container">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					<div class="col">
						<div class="card shadow-sm">
							<div style="text-align: center; margin-top:25px;">
								<title>tet</title>
								<img style=" width: 70%; " src="./images/CrepArt.jpg">
							</div>
							<div class="card-body">
								<p class="card-text">Aller venez voir nos CrepArt et peut etre en faire grace a l'expo</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									</div>
									<small class="text-muted">13/09/2022</small>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Reglement -->
	<section id="regle" class="inner-categorie">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>Game :</h2>
					<p>Les diffrents jeux vidéo sont proposé comme Minecraft, Paint-Ball et Maker King si vous voulez en <a href="">ça savoir plus</a></p>
				</div>
				<div class="col">
					<h2>Crepart :</h2>
					<p>C'est de la création de crepet personnalise comme chat, chien, si vous voulez en <a href=""> ça savoir plus</a></p>
				</div>
				<div class="col">
					<h2>Cosplay :</h2>
					<p>Ça consiste à revêtir l'apparence d'un personnage issu des mangas, de la science-fiction et des jeux vidéo si vous voulez <a href=""> savoir plus</a></p>
				</div>
				<div class="row">
				<div class="col">
					<h2>Dessin :</h2>
					<p>Des création de personnage, paysage, d'objet ou autre, si vous voulez en <a href=""> savoir plus</a></p>
				</div>
				<div class="col">
					<h2>Photo :</h2>
					<p>Representation d'un dessin par un photographie de vous même,j si voulez en <a href=""> savoir plus</a></p>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!-- affichage base de donnée  -->
	<section id="three" class="wrapper ">
		<div class="inner">
			<h1>Participent</h1>
			<div class="container">
				<div class="row justify-content-center">
						<?php
						$stmt = $bdd->prepare('SELECT * FROM utilisateurs ORDER BY id DESC');
						$stmt->execute();
						if ($stmt->rowCount() > 0) {
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								extract($row);

								if (!$row['confirme']) //Vérification de l'inscrit
								{
								?>
								<div class="col col-sm">
									<img class="profile-img"src="./images/<?php echo $row['img'] ?>" alt="Pic 01" width="150" height="150">
									<h3><?php echo $row['pseudo'] ?></h3>
									<p><a class="profile-bouton" href="#view-write-<?php echo $row['token'] ?>">Voir Plus</a></p>
									<a class="profile" id="view-write-<?php echo $row['token'] ?>" href="#three">
											<div class="test">
												<h2><?php echo $row['pseudo'] ?></h2>
												<p><?php echo $row['msg'] ?></p>
												<img class="img" src="./images/<?php echo $row['img'] ?>" alt="Pic 01">
											</div>
										</div>
									</a>

								<?php
								}
								/* else {
											echo "<h1 class='test01'>Les inscriptions pour PopExpo des artistes seront bientôt ouvertes !</h1>
											<style>.test01 {text-align: center}</style>";
										} */
							}
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<h3>Inscription</h3>
			<form action="inscription_traitement.php" method="post" enctype="multipart/form-data">
				<div class="field half first">
					<label for="name">Pseudo<strong> *</strong></label>
					<input type="text" name="pseudo" class="form-control" placeholder="toto56" required="required" autocomplete="off">
				</div>
				<div class="field half">
					<label for="email">Email<strong> *</strong></label>
					<input type="email" name="email" class="form-control" placeholder="toto@gmail.com" required="required" autocomplete="off">
				</div>
				<div class="row">
					<div class="col-8">
						<label for="message">Description<strong> *</strong></label>
						<textarea type="message" name="message" required="required" placeholder="Je me presente ..."></textarea>
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
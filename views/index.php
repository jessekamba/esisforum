<?php
	if(!isset($_GET['categorie'])) $_GET['categorie'] = 'all';
	require_once('../models/dao/check_connexion.php');
	require_once('../models/dao/connexiondb.class.php');
	require_once('../models/dao/questionDAO.php');
	require_once('../models/dao/commentaireDAO.php');
	require_once('../models/dao/etudiantDAO.php');
	require_once('../controllers/get_all_question.php');
	
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="static/css/style.css">
		<link rel="stylesheet" href="static/css/header_style.css">
		<link rel="stylesheet" href="static/css/section_style.css">
		<link rel="stylesheet" href="static/css/inscription_style.css">
		<link rel="stylesheet" href="static/css/erreurs_style.css">
		<title>
			<?php 
				if($connected) 
					echo "Esis-Forum | " .  strtoupper($_SESSION['matricule']);
				else echo "Esis-Forum | Invité";
			?>
		</title>
	</head>
	<body>
		<?php
			include_once "header.php";
		?>
		<section>
			<div class="menu_filiere">
				<ul>
					<li <?php if(isset($_GET['categorie']) && $_GET['categorie']=='all') echo 'class="active"';?>><a href="index.php?categorie=all">Tous</a></li>
					<li <?php if(isset($_GET['categorie']) && $_GET['categorie']=='design') echo 'class="active"';?>><a href="index.php?categorie=design">Design</a></li>
					<li <?php if(isset($_GET['categorie']) && $_GET['categorie']=='genielog') echo 'class="active"';?>><a href="index.php?categorie=genielog">Génie Logiciel</a></li>
					<li <?php if(isset($_GET['categorie']) && $_GET['categorie']=='reseau') echo 'class="active"';?>><a href="index.php?categorie=reseau">Réseaux & Admin</a></li>
					<li <?php if(isset($_GET['categorie']) && $_GET['categorie']=='autre') echo 'class="active"';?>><a href="index.php?categorie=autre">Autres</a></li>
					<?php
						if(!$connected) echo '<li id=inscription><a href="#">S\'inscrire</a></li>';
					?>
				</ul>
			</div>
			<div class="liste_question">
				<?php
					$tabCategorie = array(	
						'all' => 'Tous',
						'design' => 'Design',
						'genielog' => 'Génie Logiciel',
						'reseau' => 'Réseaux & Admin',
						'autre' => 'Autres'
					);
					$etats = array(
						'0' => 'Résolu',
						'1' => 'Non-Résolu'
					);
					$etudiantdao = new EtudiantDAO();
					$commentdao = new CommentaireDAO();
					while($oneQuestion = $allQuestions->fetch()){
						$sender = $etudiantdao->getEtudiantById($oneQuestion['idEtudiant']);
						if($commentdao->nombreCommentaire($oneQuestion['id'])==0) $nbr_commentaire = "Aucun commentaire";
						else if($commentdao->nombreCommentaire($oneQuestion['id'])==1) $nbr_commentaire = "Un commentaire";
						else $nbr_commentaire =  $commentdao->nombreCommentaire($oneQuestion['id'])." Commentaires";
						echo '
							<a href="question.php?idQuestion='.$oneQuestion['id'].'">
								<div class="une_question">
									<div class="entete_question">
										<div class="initials">
											<p style="background-color:'.$sender['couleur'].'">'.
												strtoupper($sender['prenom'][0].$sender['postnom'][0])
											.'</p>
											<h3>'.$sender['prenom'].' '.$sender['postnom'].'</h3>
										</div>
										<div class="rigth">
											<div class="categorie">'.$tabCategorie[$oneQuestion['categorie']].'</div>•
											<div class="etat_question">'.$etats[$oneQuestion['etat']].'</div>
										</div>
									</div>
									<div class="contenu_question">
										<p>'.
											$oneQuestion['contenu']
										.'</p>
									</div>
									<div class="footer_question">
										<p class="nbr_commentaire">'.$nbr_commentaire.'</p>
										<p class="date_comment"> Le '.(new DateTime($oneQuestion['date']))->format('d-m-Y \à H:i').'</p>
									</div>
								</div>
							</a>
						';
					}
				?>
			</div>
		</section>
		<?php
			if(!$connected) include_once "inscription.php";
			include_once "erreurs.php"; 
			include_once "footer.php";
		?>
		<script src="static/js/inscription_script.js"></script>
		<script src="static/js/we_footer_script.js"></script>
        <script src="static/js/erreur_script.js"></script>
	</body>
</html>
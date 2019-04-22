<?php
    require_once('../models/dao/check_connexion.php');
	require_once('../models/dao/connexiondb.class.php');
    require_once('../models/dao/etudiantDAO.php');	
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
        <link rel="stylesheet" href="static/css/new_section_style.css">
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
            <div class="explication_new_disc">
                <p>Poster ici vos questions et vos préoccupations et toute l'ESIS tentera d'y trouver une solution.</p>
            </div>
            <div class="new_discussion">
                <h3>Poster une question</h3>
                <form action="../controllers/add_question.php" method="POST">
                    <select name="categorie" id="categorie">
                        <option value="categorie">Catégorie</option>
                        <option value="design">Design</option>
                        <option value="genielog">Génie Logiciel</option>
                        <option value="reseau">Réseaux & Admin</option>
                        <option value="autre">Autres</option>
                    </select>
                    <textarea name="contenu" id="contenu_field" cols="30" rows="10" placeholder="Votre Question ici..." required="required"></textarea>
                    <input type="submit" value="Poster">
                </form>
            </div>
        </section>
        <?php
            include_once "erreurs.php";
            include_once "footer.php";
        ?>
        <script src="static/js/erreur_script.js"></script>
    </body>
</html>
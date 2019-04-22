<?php
    require_once('../models/dao/check_connexion.php');
	require_once('../models/dao/connexiondb.class.php');
	require_once('../models/dao/questionDAO.php');
    require_once('../models/dao/commentaireDAO.php');
    require_once('../models/dao/etudiantDAO.php');
	require_once('../controllers/get_question.php');
	require_once('../controllers/get_all_comment.php');
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
        <link rel="stylesheet" href="static/css/question_style.css">
		<link rel="stylesheet" href="static/css/inscription_style.css">
        <link rel="stylesheet" href="static/css/option_commentaire_style.css">
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
            <div class="question">
                <div class="entete_question">
                    <div class="posteur">
                        <div class="initials">
                            <p <?php echo 'style="background-color:'.$sender['couleur'].'"'; ?>>
                                <?php 
                                    echo strtoupper($sender['prenom'][0].$sender['postnom'][0]);
                                ?>
                            </p>
                        </div>
                        <h3>
                            Par 
                            <?php 
                                echo $sender['prenom'].' '.$sender['postnom'];
                            ?>
                        </h3>
                    </div>
                    <div class="etat_question rigth">
                        <?php 
                            if(!$etatQuestion) echo "Résolu";
                            else{
                                if(isset($_SESSION['matricule']) && $sender['matricule']==strtoupper($_SESSION['matricule'])) echo '<a href="../controllers/passageReadOnly.php?idQuestion='.$question['id'].'" title="Résoudre">';
                                echo "Non-Résolu";
                                if(isset($_SESSION['matricule']) && $sender['matricule']==strtoupper($_SESSION['matricule'])) echo '</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="contenu_question">
                    <p>
                        <?php
                            echo $question['contenu'];
                        ?>
                    </p>
                </div>
                <div class="footer_question">
                    <p class="nbr_commentaire">
                        <?php
                            if($nbComment==0) echo "Aucun commentaire";
                            else if($nbComment==1) echo "Un commentaire";
                            else echo $nbComment." Commentaires";
                        ?>
                    </p>
                    <p class="date_comment">
                        Le 
                        <?php
                            echo (new DateTime($question['date']))->format('d-m-Y \à H:i');
                        ?>
                    </p>
                </div>
            </div>
            <div class="all_comments">
                <?php
                    while($comment = $allComments->fetch()){
                        $sender = $etudiantdao->getEtudiantById($comment['idEtudiant']);
                        echo '
                            <div class="comment">
                                <div class="commentateur">
                                    <div class="initials">
                                        <p style="background-color:'.$sender['couleur'].'">'.strtoupper($sender['prenom'][0].$sender['postnom'][0]).'</p>
                                        <h3>'.$sender['prenom'].' '.$sender['postnom'].'</h3>
                                    </div>
                                </div>
                                <div class="commentaire">
                                    <p>'.
                                        $comment['contenu']
                                    .'</p>
                                </div>
                                <div class="footer_comment">
                                    <p class="date_comment">Le '.(new DateTime($comment['date']))->format('d-m-Y \à H:i').'</p>
                                </div>
                            </div>
                        ';
                    }
                ?>
                <div id="lastMessage"></div>
            </div>
            <?php
                include_once "option_commentaire.php";
            ?>
        </section>
        <?php
            include_once "erreurs.php";
			if(!$connected) include_once "inscription.php";
		?>
        <script src="static/js/question_script.js"></script>
        <script src="static/js/commenter_script.js"></script>
        <script src="static/js/erreur_script.js"></script>
    </body>
</html>
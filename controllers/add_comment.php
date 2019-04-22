<?php
    require_once('../models/dao/check_connexion.php');
	require_once('../models/structure/commentaire.class.php');
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/dao/etudiantDAO.php');
	require_once('../models/dao/commentaireDAO.php');
	
	if(isset($_POST['commentaire'], $_GET['idQuestion'])) {
        $contenu = $_POST['commentaire'];
        $idQuestion = $_GET['idQuestion'];
        
        $commentdao = new CommentaireDAO();
        $etudao = new EtudiantDAO();
        if((date("H")+2)=='24') $heure = 00;
        else if((date("H")+2)=='25') $heure = 01;
        else $heure = date("H")+2;

        $idEtudiant = $etudao->getIdEtudiantByMatricule($_SESSION['matricule']);
        $commentaire = new Commentaire(null,  $idEtudiant, $idQuestion, $contenu, date("Y-m-d ".$heure.":i:s"));

        $res = $commentdao->ajouterCommentaire($commentaire);
        
        if($res) {          
            header('Location: ../views/question.php?idQuestion='.$idQuestion);

        } else {
            header('Location: ../views/question.php?idQuestion='.$idQuestion.'&error=-1');
        }		
	} else {
		header('Location: ../views/question.php?idQuestion='.$idQuestion.'&error=4');;
	}
?>
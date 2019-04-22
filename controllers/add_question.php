<?php
    require_once('../models/dao/check_connexion.php');
	require_once('../models/structure/question.class.php');
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/dao/etudiantDAO.php');
	require_once('../models/dao/questionDAO.php');
	
	if(isset($_POST['contenu'], $_POST['categorie'])) {
		$matricule = $_SESSION['matricule'];
        $contenu = $_POST['contenu'];
        $categorie = $_POST['categorie'];
        $etat = '1';
        if(strcmp($categorie, "categorie") == 0) 
            header('Location: ../views/new_question.php?error=7');
        else{
            $etudao = new EtudiantDAO();
        
            $idEtudiant = $etudao->getIdEtudiantByMatricule($matricule);
            if((date("H")+2)=='24') $heure = 00;
            else if((date("H")+2)=='25') $heure = 01;
            else $heure = date("H")+2;
            $question = new Question(null,  $idEtudiant, $contenu, date("Y-m-d ".$heure.":i:s"), $categorie, $etat);
            $publidao = new QuestionDAO();
            

            $res = $publidao->nouvelleQuestion($question);
            
            if($res) {            
                header('Location: ../views/question.php');

            } else {
                header('Location: ../views/index.php?error=1.php');
            }
        }		
	} else {
		header('Location: ../views/index.php?error=5.php');
	}
?>
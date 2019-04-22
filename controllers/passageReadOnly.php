<?php
    require_once('../models/dao/check_connexion.php');
    require_once('../models/dao/connexiondb.class.php');
    require_once('../models/dao/questionDAO.php');
    require_once('../models/dao/etudiantDAO.php');

    if(isset($_GET['idQuestion'])) {
        require_once('get_question.php');
        $response = $questiondao->changerEtatQuestion($_GET['idQuestion']);
        if($response) {          
            header('Location: ../views/question.php?idQuestion='.$_GET['idQuestion']);
        } else {
            header('Location: ../views/question.php?error=5');
        }		
    }
    else {
        header('Location: ../views/question.php?error=5');
    }
?>
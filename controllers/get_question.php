<?php
    if(isset($_GET['idQuestion'])){
        $questiondao = new QuestionDAO();
        $etudiantdao = new EtudiantDAO();
        $question = $questiondao->getQuestion($_GET['idQuestion']);
        if($question['etat'] == '0') $etatQuestion = false;
        else if($question['etat'] == '1') $etatQuestion = true;
        $sender = $etudiantdao->getEtudiantById($question['idEtudiant']);
    }
    else{
        header('Location: index.php');
    }
?>
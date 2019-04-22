<?php
    if(isset($_GET['categorie'])){
        $questiondao = new QuestionDAO();
        $allQuestions = $questiondao->getAllquestion($_GET['categorie']);
    }
?>
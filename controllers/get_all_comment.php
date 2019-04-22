<?php
    if(isset($_GET['idQuestion'])){
        $commentdao = new CommentaireDAO();
        $allComments = $commentdao->getAllCommentaires($_GET['idQuestion']);
        $nbComment = $commentdao->nombreCommentaire($_GET['idQuestion']);
    }
?>
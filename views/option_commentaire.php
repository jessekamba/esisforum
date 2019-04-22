<div class="option_commentaire">
    <?php
        if(!$connected && $etatQuestion){
            echo '
                <a href="#" class="commenter_no_connected">
                    <p>Commenter</p>
                </a>
            ';
        } else if($connected && $etatQuestion){
            echo '
                <form action="../controllers/add_comment.php?idQuestion='.$question['id'].'" method="POST" class="partie_comment">
                    <textarea name="commentaire" id="input_partie_comment" cols="30" rows="10" placeholder="Votre commentaire ici..." required="required"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            ';
        }
    ?>
</div>
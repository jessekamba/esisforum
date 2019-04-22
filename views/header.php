<?php
    if($connected){
        $sessionActor = (new EtudiantDAO())->getEtudiantByMatricule(strtoupper($_SESSION['matricule']));
    }
?>
<header>
    <div class="title">
        <a href="..">
            <h1>Esis-Forum</h1>
        </a>
    </div>
    <?php
        if($connected){
           echo '
                <div class="connected">
                    <a href="new_question.php">
                        <p>Nouvelle question</p>
                    </a>
                    <a href="../controllers/deconnexion.php">
                        <p>Deconnexion</p>
                    </a>
                    <div class="initials"><p style="background-color:'.$sessionActor['couleur'].'" title="'.$sessionActor['prenom'].' '.$sessionActor['postnom'].'">'.strtoupper($sessionActor['prenom'][0].$sessionActor['postnom'][0]).'</p></div>
                </div>
           '; 
        } else{
            echo '
                <div class="inscription_connexion">
                    <form action="../controllers/new_connexion.php" method="POST" id="connexion" required="required">
                        <input type="text" name="matricule" placeholder="Matricule" required="required">
                        <input type="password" name="pwd" placeholder="Mot de Passe">
                        <input type="submit" value="Se Connecter">
                    </form>
                </div>
            ';
        }
    ?>    
</header>
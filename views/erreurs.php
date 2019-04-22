<?php
    if(isset($_GET['error'])){
        switch ($_GET['error']) {
            case '0':
                echo '<p class="erreurs greenERROR">Bienvenu '.$sessionActor['prenom'].'</p>';
                break;
            
            case '1':
                echo '<p class="erreurs redERROR">Une erreur s\'est produite lors de la création du compte</p>';
                break;
            
            case '2':
                echo '<p class="erreurs redERROR">Erreur: votre matricule n\'a pas été reconnu</p>';
                break;

            case '3':
                echo '<p class="erreurs redERROR">Erreur sur la confirmation de mot passe</p>';
                break;

            case '4':
                echo '<p class="erreurs redERROR">Erreur sur les données envoyées</p>';
                break;
            
            case '5':
                echo '<p class="erreurs redERROR">Erreur: echec sur la connexion à votre compte</p>';
                break;
            
            case '6':
                echo '<p class="erreurs greenERROR">Déconnexion effectuée</p>';
                break;

            case '7':
                echo '<p class="erreurs redERROR">Vous devez choisir une catégorie</p>';
                break;

            default:
                echo '<p class="erreurs redERROR">Une erreur s\'est produite</p>';
                break;
        }
    }
?>
<?php
	require_once('../models/structure/etudiant.class.php');
	require_once('../models/dao/connexiondb.class.php');
	require_once('../models/dao/etudiantDAO.php');
	
	if(isset($_POST['matricule'], $_POST['pwd'])) {
		$matricule = $_POST['matricule'];
		$pwd = $_POST['pwd'];
		
		$etudao = new EtudiantDAO();
		$noms = $etudao->verifier_matricule($matricule);
		$etudiant = new Etudiant(0, $matricule, $pwd, $noms['nom'], $noms['postnom'], $noms['prenom'], null);
		$res = $etudao->seConnecter($etudiant);
		
		if($res) {
			//Créer une session
			session_start();
			$_SESSION['matricule'] = $matricule;
			
			header('Location: ../views/index.php?error=0');
		} else {
			header('Location: ../views/index.php?error=5');
		}	
	} else {
		header('Location: ../views/index.php?error=4');
	}
?>
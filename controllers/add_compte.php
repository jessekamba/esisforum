<?php
	require_once('../models/structure/etudiant.class.php');
	require_once('../models/dao/connexiondb.class.php');
	require_once('../models/dao/etudiantDAO.php');
	require_once('RandomColor.php');
	
	if(isset($_POST['matricule'], $_POST['pwd'], $_POST['confirmpwd'])) {
		$matricule = strtoupper($_POST['matricule']);
		$pwd = $_POST['pwd'];
		$pwdconf = $_POST['confirmpwd'];
		if(strcmp($pwd, $pwdconf) == 0) {
			$etudao = new EtudiantDAO();
			if($etudao->verifier_matricule($matricule)){
				$noms = $etudao->verifier_matricule($matricule);
				$couleur = RandomColor::one(array(
					'luminosity' => 'dark',
					'hue' => 'random'
				));
				$etudiant = new Etudiant(0, $matricule, $pwd, $noms['nom'], $noms['postnom'], $noms['prenom'], $couleur);
				$res = $etudao->creerCompte($etudiant);
				if($res) {
					session_start();
					$_SESSION['matricule'] = strtoupper($matricule);
					header('Location: ../views/index.php?error=0');
				} else {
					header('Location: ../views/index.php?error=1');
				}
			} else{
				header('Location: ../views/index.php?error=2');
			}			
		} else {
			header('Location: ../views/index.php?error=3');
		}
	} else {
		header('Location: ../views/index.php?error=4');
	}
?>
<?php

	class EtudiantDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function seConnecter($etudiant) {
			$str = "SELECT * FROM etudiant WHERE matricule = :matricule AND pwd = :pwd";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'matricule' => $etudiant->getMatricule(),
				'pwd' => $etudiant->getPwd()
			));
			
			$res = $req->fetch();
			
			if($res != null) {
				return True;
			} else {
				return False;
			}
		}
		
		public function creerCompte($etudiant) {
			$str = "INSERT INTO etudiant VALUES(null, :matricule, :pwd, :nom, :postnom, :prenom, :couleur)";
			$req = $this->db->prepare($str);
			$res = $req->execute(array(
				'matricule' => $etudiant->getMatricule(),
				'pwd' => $etudiant->getPwd(),
				'nom' => $etudiant->getNom(),
				'postnom' => $etudiant->getPostnom(),
				'prenom' => $etudiant->getPrenom(),
				'couleur' => $etudiant->getCouleur()
			));
			
			
			if($res) {
				return True;
			} else {
				return False;
			}
		}

		public function getEtudiantByMatricule($matricule) {
			$str = "SELECT * FROM etudiant WHERE matricule = :matricule";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'matricule' => $matricule
			));
			
			$res = $req->fetch();
			
			if($res != null) {
				return $res;
			} else {
				return False;
			}
		}

		public function getIdEtudiantByMatricule($matricule) {
			$str = "SELECT id FROM etudiant WHERE matricule = :matricule";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'matricule' => $matricule
			));
			
			$res = $req->fetch();
			
			if($res != null) {
				return $res[0];
			} else {
				return False;
			}
		}

		public function getEtudiantById($idEtudiant) {
			$str = "SELECT * FROM etudiant WHERE id = :idEtudiant";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'idEtudiant' => $idEtudiant
			));
			
			$res = $req->fetch();
			
			if($res != null) {
				return $res;
			} else {
				return False;
			}
		}
		

		public function verifier_matricule($matricule){
			require_once('PHPExcel/Classes/PHPExcel.php');//inclusion de kla bibliotheque
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');//creation du lecteur excel
			$objPHPExcel = $objReader->load("../views/static/liste_etudiants/G2.xlsx");//chargement du fichier
			$sheet = $objPHPExcel->getActiveSheet() ; // affection du contenu de la page active
			$numero = 2;//indice des noms dans le ficier excel
			do{
				$cell = $sheet->getCell('B'.$numero) ; //affectation du contenu du fichier(conlonne 'Matricule') ligne par ligne
				if($matricule==strtoupper($cell->getValue())){
					return array(
						"nom" => $sheet->getCell('C'.$numero),
						"postnom" => $sheet->getCell('D'.$numero),
						"prenom" => $sheet->getCell('E'.$numero)
					);
				}
				$numero++;//passage à la cellule suivante
			}while($cell!="");
			return false;
		}
	}
?>
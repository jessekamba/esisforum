<?php

	class QuestionDAO {
		private $db;
		
		public function __construct() {
			$this->db = ConnexionDB::getConnexion();
		}
		
		public function getQuestion($idQuestion) {
			$str = "SELECT * FROM question WHERE id = :idQuestion";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'idQuestion'=>$idQuestion
			));
			$res = $req->fetch();
			if($res != null) {
				return $res;
			} else {
				return False;
			}
		}
		
		public function nouvelleQuestion($question) {
			$str = "INSERT INTO question VALUES(null, :idEtudiant, :contenu, :date, :categorie, :etat)";
			$req = $this->db->prepare($str);
			$res = $req->execute(array(
				'idEtudiant' => $question->getIdEtudiant(),
				'contenu' => $question->getContenu(),
				'date' => $question->getDate(),
				'categorie' => $question->getCategorie(),
				'etat' => $question->getEtat()
			));
			
			if($res) {
				return True;
			} else {
				return False;
			}
		}
		
		public function getAllquestion($categorie) {
			if($categorie=="all"){
				$str = "SELECT * FROM question ORDER BY DATE DESC";
				$req = $this->db->prepare($str);
				$req->execute();
			} else{
				$str = "SELECT * FROM question WHERE categorie = :categorie ORDER BY DATE DESC";
				$req = $this->db->prepare($str);
				$req->execute(array(
					'categorie' => $categorie
				));
			}
			
			if($req != null) {
				return $req;
			} else {
				return False;
			}
        }

        public function changerEtatQuestion($idQuestion){
            $str = "UPDATE question SET etat = :etat WHERE id = :idQuestion";
            $etat = '0';
            $req = $this->db->prepare($str);
			$res = $req->execute(array(
                'etat' => $etat,
				'idQuestion' => $idQuestion
			));
			
			if($res) return True;
			else return False;
        }
	}
?>
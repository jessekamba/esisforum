<?php
	class CommentaireDAO{
		private $db;
		
		public function __construct(){
			$this->db = ConnexionDB::getConnexion();
		}
		public function nombreCommentaire($idQuestion){
			$str = "SELECT count(*) FROM commentaire WHERE idQuestion = :idQuestion";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'idQuestion' => $idQuestion
			));
			$res = $req->fetch();
			if($res != null){
				return $res[0];
			}else{
				return false;
			}
		}
		
		public function ajouterCommentaire($commentaire){
			$str = "INSERT INTO commentaire values(null, :idEtudiant, :idQuestion, :contenu, :date)";
			$req = $this->db->prepare($str);
			$res = $req->execute(array(
				'idEtudiant' => $commentaire->getIdEtudiant(),
				'idQuestion' => $commentaire->getIdQuestion(),
				'contenu' => $commentaire->getContenu(),
				'date' => $commentaire->getDate()
			));
			
			if($res) return true;
			else return false;
		}

		public function getAllCommentaires($idQuestion){
			$str = "SELECT * FROM commentaire WHERE idQuestion = :idQuestion ORDER BY DATE";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'idQuestion' => $idQuestion
			));
			if($req!=null) return $req;
			else return false;
		}

		public function getCommentaire($idCommentaire){
			$str = "SELECT * FROM  commentaire WHERE id = :id ORDER BY DATE";
			$req = $this->db->prepare($str);
			$req->execute(array(
				'id' => $idCommentaire
			));
			$res = $req->fetch();
			if($res != null) {
				return $res;
			} else {
				return False;
			}
		}
	}
	
?>
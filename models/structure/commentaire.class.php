<?php
	class Commentaire {
		private $id;
		private $idEtudiant;
		private $idQuestion;
		private $contenu;
		private $date;
		
		public function __construct($id, $idEtudiant, $idQuestion, $contenu, $date) {
			$this->id = $id;
			$this->idEtudiant = $idEtudiant;
			$this->idQuestion = $idQuestion;
			$this->contenu = $contenu;
			$this->date = $date;
			
		}
		
		public function getId() {
			return $this->id;
		}
		
		public function getIdEtudiant() {
			return $this->idEtudiant;
		}
		
		public function getidQuestion() {
			return $this->idQuestion;
		}
		
		public function getContenu() {
			return $this->contenu;
		}
		
		public function getDate() {
			return $this->date;
		}
	}
?>
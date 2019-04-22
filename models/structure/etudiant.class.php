<?php
	class Etudiant {
		private $id;
		private $matricule;
		private $pwd;
		private $nom;
		private $postnom;
		private $prenom;
		private $couleur;
		
		public function __construct($id, $matricule, $pwd, $nom, $postnom, $prenom, $couleur) {
			$this->id = $id;
			$this->matricule = $matricule;
			$this->pwd = $pwd;
			$this->nom = $nom;
			$this->postnom = $postnom;
			$this->prenom = $prenom;
			$this->couleur = $couleur;
		}
		
		
		public function getId() {
			return $this->id;
		}
		
		public function getMatricule() {
			return $this->matricule;
		}
		
		public function getPwd() {
			return $this->pwd;
		}
		
		public function getNom(){
			return $this->nom;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function getPostnom(){
			return $this->postnom;
		}

		public function getCouleur(){
			return $this->couleur;
		}
	}
?>
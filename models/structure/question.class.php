<?php
	class Question 
	{
		private $id;
		private $idEtudiant;
		private $contenu;
		private $date;
		private $categorie;
		private $etat;
		
		public function __construct($id, $idEtudiant, $contenu, $date, $categorie, $etat) {
			$this->id = $id;
			$this->idEtudiant = $idEtudiant;
			$this->contenu = $contenu;
			$this->date = $date;
			$this->categorie = $categorie;
			$this->etat = $etat;
		}
		
		public function getId() 
		{
			return $this->id;
		}
		
		public function getIdEtudiant() 
		{
			return $this->idEtudiant;
		}
		
		public function getContenu() {
			return $this->contenu;
		}
		
		public function getDate() {
			return $this->date;
		}
		
		public function getCategorie(){
			return $this->categorie;
		}
		public function getEtat(){
			return $this->etat;
		}
	}
?>
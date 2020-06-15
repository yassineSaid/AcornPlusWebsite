<?php

class Commande
{
		private $id;
		private $nom;
		private $prenom;
		private $email;
		private $telephone;
		private $quantite;
		private $poids;
		private $adresse;
		

		public function __construct($nom, $prenom, $email, $telephone, $adresse, $quantite, $poids)
		{
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->email = $email;
			$this->telephone = $telephone;
			$this->quantite = $quantite;
			$this->poids = $poids;
			$this->adresse = $adresse;
		}

		public function get_id()
		{
			return $this->id;
		}

		public function set_id($id)
		{
			$this->id = $id;
		}

		public function get_nom()
		{
			return $this->nom;
		}

		public function set_nom($nom)
		{
			$this->nom = $nom;
		}

		public function get_prenom()
		{
			return $this->prenom;
		}

		public function set_prenom($prenom)
		{
			$this->prenom = $prenom;
		}

		public function get_email()
		{
			return $this->email;
		}

		public function set_email($email)
		{
			$this->email = $email;
		}

		public function get_telephone()
		{
			return $this->telephone;
		}

		public function set_telephone($telephone)
		{
			$this->telephone = $telephone;
		}

		public function get_quantite()
		{
			return $this->quantite;
		}

		public function set_quantite($quantite)
		{
			$this->quantite = $quantite;
		}

		public function get_poids()
		{
			return $this->poids;
		}

		public function set_poids($poids)
		{
			$this->poids = $poids;
		}

		public function get_adresse()
		{
			return $this->adresse;
		}

		public function set_adresse($adresse)
		{
			$this->adresse = $adresse;
		}



}




?>
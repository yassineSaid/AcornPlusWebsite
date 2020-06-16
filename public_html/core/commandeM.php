<?php


require '../../config.php';
require '../entities/commande.php';

class CommandeM
{

	public function ajoutCommande(Commande $commande)
	{
		$db = config::getConnexion();
		$req = "INSERT INTO commande (nom, prenom, email, telephone, adresse, quantite, poids) VALUES (:nom, :prenom, :email, :telephone, :adresse, :quantite, :poids)";

		$sql = $db->prepare($req);
		$sql->bindvalue(":nom", $commande->get_nom());
		$sql->bindvalue(":prenom", $commande->get_prenom());
		$sql->bindvalue(":email", $commande->get_email());
		$sql->bindvalue(":telephone", $commande->get_telephone());
		$sql->bindvalue(":quantite", $commande->get_quantite());
		$sql->bindvalue(":poids", $commande->get_poids());
		$sql->bindvalue(":adresse", $commande->get_adresse());

		try {
			$sql->execute();
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
}

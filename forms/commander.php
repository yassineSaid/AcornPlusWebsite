<?php
require_once '../core/commandeM.php';
$commandeM = new CommandeM();
if (isset($_POST['nom'])) {
    $commande = new Commande($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'], $_POST['quantite'], $_POST['poids']);
    $commandeM->ajoutCommande($commande);

    $dest = "yassine.said19@gmail.com";
    $sujet = "Nouvelle commande de ".$_POST['prenom']." ".$_POST['nom'];
    $corp = "Nom: ".$_POST['nom']."\n"."Prenom: ".$_POST['prenom']."\n"."Email: ".$_POST['email']."\n"."Téléphone: ".$_POST['telephone']."\n"."Adresse: ".$_POST['adresse']."\n"."Quantité: ".$_POST['quantite']." * ".$_POST['poids']." grammes";
    $headers = "From: fw.events2019@gmail.com";

    if (mail($dest, $sujet, $corp, $headers)) {
        return http_response_code(201);
    } else {
        return http_response_code(500);
    }
    return http_response_code(500);
    
}

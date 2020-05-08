<?php
require_once '../core/commandeM.php';
$commandeM = new CommandeM();
if (isset($_POST['nom'])) {
    $commande = new Commande($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'], $_POST['quantite']);
    $commandeM->ajoutCommande($commande);

    $dest = "yassine.said19@gmail.com";
    $sujet = "Nouvelle commande de ".$_POST['prenom']." ".$_POST['nom'];
    $corp = "Nom: ".$_POST['nom']."\n"."Prenom: ".$_POST['prenom']."\n"."Email: ".$_POST['email']."\n"."Téléphone: ".$_POST['telephone']."\n"."Adresse: ".$_POST['adresse']."\n"."Quantité: ".$_POST['quantite']." KG";
    $headers = "From: fw.events2019@gmail.com";
    if (mail($dest, $sujet, $corp, $headers)) {
        http_response_code(201);
    } else {
        http_response_code(500);
    }
    
}

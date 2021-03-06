<?php

include_once("../model/DAO.class.php");

////////////////////////////////////////////////////
//// RECUPERATION DES DONNEES
///////////////////////////////////////////////////
//Pour le header
$categories = $dao->getCategories();

$articles = array();

$valider = isset($_GET['action']);

//Le client est connecté
session_start();
$connecte = isset($_SESSION['id']);

////////////////////////////////////////////////////
//// REALISATION DES CALCULS
///////////////////////////////////////////////////

//Suprression de cookie en trop
if (isset($_COOKIE['PHPSESSID'])) {
   unset($_COOKIE['PHPSESSID']);
}

//Si $valider est vrai selon signifie que l'utilisateur ...
// ... a validé son panier ET été connecté
if($valider) {
  foreach($_COOKIE as $key => $value){
   // Suppression du cookie
   setcookie($key, $value, time() - 36000);
 }
 // $msg = 'Votre commande a bien été prise en compte';
}

//S'il y a "supprimer" dans l'URL, cela signifie que ...
// ... l'utilisateur veut supprimer cet article de son panier
if (isset($_GET['supprimer'])) {
  $ref = $_GET['supprimer'];
  $nbCommande = $_COOKIE[$ref];
  // Suppression du cookie
  unset($_COOKIE[$ref]);
  setcookie($ref);
}

//Création tableau d'article venant des cookies enregistrés
foreach ($_COOKIE as $key => $value) {
  //Si on a au moins une commande
  $a = $dao->getArticle((int)$key); // On récurère l'article
  $a->nbCommande = $value; //ajoute un attribut nbCommande

  array_push($articles, $a);
}

$prixTotal = 0;

//Pour calculer le prix total
foreach ($articles as $value) {
  $prixTotal = $prixTotal + $value->prix*$value->nbCommande;
}

////////////////////////////////////////////////////
//// DECLANCHEMENT DE LA VUE
///////////////////////////////////////////////////

// Pour éviter une ré-actualisation de la page qui renverrais...
// ...qui renverrais les mêmes paramètres et leverais une erreur
if ($valider) {
  header('Location: ../controler/afficherPanier.ctrl.php?msg=ok');
} else if (isset($_GET['supprimer'])) {
  header('Location: ../controler/afficherPanier.ctrl.php');
} else {
  if (isset($_GET['msg'])) $msg = 'Votre commande a bien été prise en compte';
  include('../view/panier.view.php');
}

?>

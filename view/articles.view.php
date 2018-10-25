<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Articles</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
    <?php require_once('../view/header.view.php'); ?>
    <!-- Une section contient l'ensemble des produit à afficher -->

    <!-- Si un produit a été commandé on affiche un message de sa prise en compte -->
    <?php if(isset($commande)) :?>
    <p class="panier">Votre produit a été ajouté au panier</p>
    <?php endif?>
    <?php if($articles == null): ?>
      <p class="noresult">Aucun article ne correspond à votre recherche</p>
    <?php endif?>
    <section>
      <?php foreach ($articles as $value) :?>
      <!-- Chaque div représente un article -->
      <!-- lorsque clique sur le lien ajoute au panier : cookie ?-->
      <a href="../controler/afficherArticles.ctrl.php?categorie=<?= $categorie?>&article=<?= $value->ref ?>">
        <div>
          <img src="../view/image/vins/<?= $value->image ?>" alt="<?= $value->libelle?>">
          <!-- Nom du vin -->
          <h3><?= $value->libelle ?></h3>
          <!-- Description du vin -->
          <p><?= $value->description?></p>
          <!-- Caractéristiques -->
          <!-- Annee -->
          <p><?= $value->annee?></p>
          <!-- Pourcentage alcool -->
          <p><?= $value->pourcentageAlcool?>% d'alcool</p>
        </div>
      </a>
    <?php endforeach ?>

    </section>

  </body>
</html>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alcooliques&Anonymes - Connexion</title>
    <link rel="stylesheet" href="../view/stylesheet.css">
  </head>
  <body>
      <?php require_once('../view/header.view.php'); ?>
    <section>
      <?php if(isset($msgErreur)) : ?>
        <p class="erreur"><?= $msgErreur ?></p>
      <?php endif ?>

      <form action="../controler/afficherConnexion.ctrl.php" method="post">
        <fieldset>
          <legend>Connexion</legend>

          <input type="Email" name="mail" size="100" placeholder="Email" required/>
          <input type="password" name="ajzt" size="100" placeholder="Mot de passe" required/>
        <p>
          <input class="bouton" type="submit" value="Se connecter"/>
          <input type="checkbox" name="admin" value="Connexion Administrateur">
        </p>

      </fieldset>
    </form>
      <fieldset>
        <legend>Inscription</legend>
        <p>Première fois sur notre site? Inscrivez-vous!</p>
        <p>
          <input class="bouton" type="submit" name="inscrire" value="S'inscrire">
        </p>
      </fieldset>
    </section>

  </body>
</html>

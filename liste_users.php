<?php

$title = "Liste des utilisateurs";

/*
Vous avez un tableau d'utilisateurs contenu dans le fichier data.php, avec l'aide de ce tableau, je veux que vous mettiez en place une boucle dans une balise "<table> trouvable sur bootstrap et de faire en sorte d'afficher les données du tableau pour qu'il ressemble à celui qui apparait sur Slack

*/



?>

<?php require 'partials/header.php' ?>
<?php require 'data.php' ?>
<!-- Content -->
<main>
<table class="table">
  <thead>
    <tr>
      <th scope="col">NOM</th>
      <th scope="col">PRENOM</th>
      <th scope="col">EMAIL</th>
      <th scope="col">FONCTION</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ( $users as $user ) : ?>
    <tr>
      <th scope="row"><?= $user["name"] ?></th>
      <td><?= $user["firstName"] ?></td>
      <td><?= $user["email"] ?></td>
      <td><?= $user["fonction"] ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
<?php

$title = "Page d'accueil";

echo "<pre>";
//! Nous visualisons les données contenue dans la variable globale "$_POST
print_r($_POST);
echo "</pre>";

?>

<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <div class="mt-5 mb-5">
        <form action="/5_cours/Q1_PHP_html/checkbox.php" method="POST">
            <div class="mb-3">
                <h3>Bonjour comment allez-vous ?</h3>
            <div class="form-check">
                //! Le traitement des formulaires en checkbox se fait de la même manière sauf que la particularité de ceux-ci réside dans le fait que l'on peut choisir plusieurs données par le biais des cases à cocher. Afin de faire apparaitre les données de plusieurs cases cochées, il faut faire un traitement sur le paramètre "name" contenu dans "input" en ajoutant à coté du nom des crochets "[]".
                        <input class="form-check-input" name="reponse[]" type="checkbox" value="Bien" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bien
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="reponse[]" type="checkbox" value="Tout va bien" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Tout va bien
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="reponse[]" type="checkbox" value="Genial" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Genial
                        </label>
                    </div>
                <button type="submit" class="btn btn-success mt-5">Valider</button>
            </div>
        </form>
    </div>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
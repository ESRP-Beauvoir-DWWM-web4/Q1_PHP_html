<?php

$title = "Quiz";

echo "<pre>";
print_r($_POST);
echo "</pre>";

//! Je demandais de faire un quiz et de renvoyer un message pour chaque question disant si oui ou non la réponse était bonne.

//! Je mets en place une variable qui sera composée des bonnes réponses de chaque question.

$reponse1 = "Paris";
$reponse2 = "Planète rouge";
$reponse3 = "L'homme qui à crée l'entreprise Microsoft";
//! Je mets en place un compteur que j'initie à 0.
$count = 0;

?>
//! Nous mettons en place les formulaire avec bouton radio
<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <form action="/5_Cours/Q1_PHP_html/quiz.php" method="POST">
        <h3>Quelle est la capitale de la france ?</h3>

        <div class="form-check">
            //! Il faut bien mettre un paramètre "value" dans le formulaire sinon le bouton radio enverra comme réponse un "on"
            <input class="form-check-input" name="reponse1" value="Paris" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Paris
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse1" value="Tours" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Tours
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse1" value="Marseille" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Marseille
            </label>
        </div>

<!-- ---------------------------------------------------------- -->

        <h3>Comment surnomme t-on la planète Mars ?</h3>

        <div class="form-check">
            <input class="form-check-input" name="reponse2" value="Planète rouge" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Planète rouge
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse2" value="Planète verte" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Planète verte
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse2" value="C la réponse C" type="radio" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                C la réponse C
            </label>
        </div>

    <!-- ------------------------------------------------------------------- -->

        <h3>Qui est Bill Gates ?</h3>

        <div class="form-check">
            <input class="form-check-input" name="reponse3" value="L'inventeur de la sauce hollandaise" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                L'inventeur de la sauce hollandaise
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse3" value="L'homme qui à créer l'entreprise Ubisoft" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                L'homme qui à crée l'entreprise Ubisoft
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="reponse3" value="L'homme qui à crée l'entreprise Microsoft" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                L'homme qui à crée l'entreprise Microsoft
            </label>
        </div>
        <button class="btn btn-success" type="submit">Valider les réponses</button>
    </form>
    <!-- Condition -->

    //! Nous mettons en place une condition qui fait en sorte de faire un certain traitement si le formulaire construit plus bas est bien soumit.
    <?php if ( isset( $_POST["reponse1"] ) && isset( $_POST["reponse2"] ) && isset( $_POST["reponse3"] ) ) : ?>
        //! Je mets en place une condition qui fera en sorte d'afficher un message de succès si la case choisie est identique à la variable contenant la bonne réponse.
        <?php if ( $_POST["reponse1"] == $reponse1 ) : ?>
            <h2>Bravo, la réponse à la question 1 était bien <?= $reponse1 ?></h2>
            //! A chaque bonne réponse mon compteur sera crédité d'un point
            <?php $count = $count +1 ?>
            //! le else sera effectué si la case choisie de la question n'est pas identique à la varibale contenant la réponse.
        <?php else : ?>
            <h2>Dommage, la réponse était <?= $reponse1 ?></h2>
        <?php endif ?>
//! Nous effectuons le même traitement pour le reste des questions
        <?php if ( $_POST["reponse2"] == $reponse2 ) : ?>
            <h2>Bravo, la réponse à la question 2 était bien <?= $reponse2 ?></h2>
            <?php $count = $count +1 ?>
        <?php else : ?>
            <h2>Dommage, la réponse était <?= $reponse2 ?></h2>
        <?php endif ?>

        <?php if ( $_POST["reponse3"] == $reponse3 ) : ?>
            <h2>Bravo, la réponse à la question 3 était bien <?= $reponse3 ?></h2>
            <?php $count = $count +1 ?>
        <?php else : ?>
            <h2>Dommage, la réponse était <?= $reponse3 ?></h2>
        <?php endif ?>
    <?php endif ?>
//! Je mets en place mon compteur sur 3 qui affichera la note que j'ai à la fin du questionnaire.
    <h3>Vous avez obtenu la note de <?= $count ?> / 3</h3>

</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
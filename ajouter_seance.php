<?php
include('my_file_db.php');

if (isset($_POST['submit'])) {
    $film_id = $_POST['film_id'];
    $schedule_date = $_POST['schedule_date'];
    $room = $_POST['room'];

    $result = ajouterSeance($film_id, $schedule_date, $room);

    if ($result) {
        echo "La séance a été ajoutée avec succès !";
    } else {
        echo "Une erreur est survenue lors de l'ajout de la séance.";
    }
}
?>

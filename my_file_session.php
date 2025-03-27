<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="topnav">
        <img id="logosite" src="./Assets/Logo/creation-logo-production-film-cinema_445285-211.avif" alt="logo du site">
        <a class="actives" href="my_file_home.php">Home</a>
        <a href="my_file_movie.php">Movie</a>
        <a href="my_file_membership.php">Membership</a>
        <a href="my_file_session.php">Session</a>
    </header>
    <main>
        <div class="page" id="page4">

            <h1>Ajouter une séance pour un film</h1>
        
            <form action="ajouter_seance.php" method="POST">
                <label for="film">Sélectionnez un film :</label>
                <select name="film_id" id="film" required>
                    <?php
                    include('my_file_db.php');
                    $films = getFilms(); 
                    foreach ($films as $film) {
                        echo "<option value='{$film['id']}'>{$film['title']}</option>";
                    }
                    ?>
                </select><br><br>
        
                <label for="schedule_date">Date et Heure de la séance :</label>
                <input type="datetime-local" name="schedule_date" id="schedule_date" required><br><br>
    
                <label for="room">Salle :</label>
                <input type="text" name="room" id="room" placeholder="Salle" required><br><br>
        
                <button type="submit" name="submit">Ajouter la séance</button>
            </form>
        </div>
    </main>

    <footer>
    <div class="footer-container">
        <div class="footer-links">
            <h3>Informations</h3>
            <p><strong>Téléphone :</strong> 1-809-650-4020</p>
            <p><strong>Adresse :</strong> 120 Rue Montmartre, Paris 75002</p>
            <p><strong>Horaires :</strong> Du lundi au dimanche de 10h à 23H30</p>
        </div>
        
        <div class="social-media">
            <h3>Suivez-nous</h3>
            <a href="https://www.facebook.com/" target="_blank"><img src="./Assets/Logo/icons8-facebook-50.png" alt="logo Facebook" class="social-icon"></a>
            <a href="https://x.com/?logout=1737472505647" target="_blank"><img src="./Assets/Logo/icons8-twitter-50.png" alt="logo X (anciennement Twitter)" class="social-icon"></a>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2025 Mon Cinéma. Tous droits réservés.</p>
    </div>
</footer>
    <script src="main.js"></script>
</body>
</html>

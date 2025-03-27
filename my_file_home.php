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
        <a class="actives" href="my_file_home.php" >Home</a>
        <a href="my_file_movie.php">Movie</a>
        <a href="my_file_membership.php">Membership</a>
        <a href="my_file_session.php">Session</a>
    </div>
</header>

<main>
<div id="page1" class="page">
<div id="contenair">
        <div class="slideshow-container">
            
            <div class="mySlides fade">
                <img class="imgs" src="./Assets/Image/devanture_cinema.jpeg" alt="devanture de cinema">
            </div>
            
            <div class="mySlides fade">
                <img class="imgs" src="./Assets/Image/salle_cinema.jpeg" alt="salle de cinéma">
            </div>
            
            <div class="mySlides fade">
                <img class="imgs" src="./Assets/Image/cinema-le-prado.jpg" alt="salle de cinéma">
            </div>
            
            <div class="mySlides fade">
                <img class="imgs" src="./Assets/Image/BESTIMAGE_00525402_000012-scaled.jpeg" alt="salle de cinéma">
            </div>
            
            
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>    
        </div>
        <br>
        
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>

        </div>
    </div>
</div>



</main>

<section>
    <h1>FILMS LES PLUS POPULAIRES</h1>
    <div class="carousel">
            <div class="carouselbox"></div>
    </div>

    <h1>FILMS À L'AFFICHE</h1>
    <div class="carousel">
        <div class="carouselbox" id="carouselbox2"></div>
    </div>

</section>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.8/axios.min.js"></script>
<script src="main.js"></script>

</body> 
</html> 





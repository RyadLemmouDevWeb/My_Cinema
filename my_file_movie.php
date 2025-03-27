<?php
include 'my_file_db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$films = [];
if ($search) {
    $films = rechercherFilms($search);
}

$searchgenre = isset($_GET['genre']) ? $_GET['genre'] : '';
$movies = [];

if ($searchgenre) {
    $movies = filtreGenre($searchgenre);
}

$selected_distributor = isset($_GET['distributor']) ? $_GET['distributor'] : '';
$dist = [];
if ($selected_distributor) {
    $dist = getFilmsByDistributor($selected_distributor);
}

$conn->close();
?>

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
    
    <main id="main2">
        <div id="page2" class="page">
        <form method="get" action=""> 
        <input type="text" placeholder="Search Films..." name="search" value="<?php echo $search ?>">
        </form >
        <form method="get" action="">

            <select name="genre" id="genre" onchange="this.form.submit()">
                <option value="genre">Genre</option>
                <option value="Action"><?php echo $searchgenre == 'Action' ? 'selected' : ''; ?>Action</option>
                <option value="Animation"><?php echo $searchgenre == 'Animation' ? 'selected' : ''; ?>Animation</option>
                <option value="Adventure"><?php echo $searchgenre == 'Adventure' ? 'selected' : ''; ?>Adventure</option>
                <option value="Drama"><?php echo $searchgenre == 'Drama' ? 'selected' : ''; ?>Drama</option>
                <option value="Comedy"><?php echo $searchgenre == 'Comedy' ? 'selected' : ''; ?>Comedy</option>
                <option value="Mystery"><?php echo $searchgenre == 'Mystery' ? 'selected' : ''; ?>Mystery</option>
                <option value="Biography"><?php echo $searchgenre == 'Biography' ? 'selected' : ''; ?>Biography</option>
                <option value="Crime"><?php echo $searchgenre == 'Crime' ? 'selected' : ''; ?>Crime</option>
                <option value="Fantasy"><?php echo $searchgenre == 'Fantasy' ? 'selected' : ''; ?>Fantasy</option>
                <option value="Horror"><?php echo $searchgenre == 'Horror' ? 'selected' : ''; ?>Horror</option>
                <option value="Sci-fi"><?php echo $searchgenre == 'Sci-Fi' ? 'selected' : ''; ?>Sci-Fi</option>
                <option value="Romance"><?php echo $searchgenre == 'Romance' ? 'selected' : ''; ?>Romance</option>
                <option value="Family"><?php echo $searchgenre == 'Family' ? 'selected' : ''; ?>Family</option>
                <option value="Thriller"><?php echo $searchgenre == 'Thriller' ? 'selected' : ''; ?>Thriller</option>
            </select>
        </form>
        
        <form method="get" action="">
            <select name="distributor" id="distributor" onchange="this.form.submit()">
                <option value="">Sélectionner un distributeur</option>
                <?php foreach ($distributors as $distributor): ?>
                    <option value="<?php echo $distributor['id']; ?>" <?php echo $selected_distributor == $distributor['id'] ? 'selected' : ''; ?>>
                        <?php echo $distributor['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
        
        <?php if (!empty($films)): ?>
            <h2>Résultats pour "<?php echo $search ?>" :</h2>
            <ul>
                <?php foreach ($films as $film): ?>
                    <li>
                        <strong><?php echo $film['movie'] ?></strong><br>
                        Réalisateur : <?php echo $film['director'] ?><br>
                        Distributeur : <?php echo $film['distributor'] ?><br>
                        Durée : <?php echo $film !== NULL && isset($film['duration']) ? $film['duration'] . "min" : 'Data Unavailable' ?><br>
                        Date de sortie : <?php echo date('d/m/Y', strtotime($film['dates'])) ?><br>
                        Genre : <?php echo $film['genre']?><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($search): ?>
            <p>Aucun film trouvé pour "<?php echo $search ?>".</p>
        <?php endif; ?>

        <?php if ($searchgenre): ?>
        <h2>Films du genre: <?php echo $searchgenre; ?></h2>
        <?php if (!empty($movies)): ?>
            <ul>
                <?php foreach ($movies as $movie): ?>
                    <li>
                        <strong><?php echo $movie['movie']; ?></strong><br>
                        Réalisateur : <?php echo $movie['director']?><br>
                        Distributeur : <?php echo $movie['distributor']; ?><br>
                        Durée : <?php echo $movie !== NULL && isset($movie['duration']) ? $movie['duration'] . "min" : 'Data Unavailable' ?><br>
                        Date de sortie : <?php echo date('d/m/Y', strtotime($movie['dates'])) ?><br>

                    </li>   
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun film trouvé pour ce genre.</p>
        <?php endif; ?>
    <?php endif; ?>


    <?php if (!empty($dist)): ?>
        <h2>Films de "<?php echo htmlspecialchars($distributors[array_search($selected_distributor, array_column($distributors, 'id'))]['name']); ?>" :</h2>
        <ul>
            <?php foreach ($dist as $distr): ?>
                <li>
                    <strong><?php echo $distr['movie']; ?></strong><br>
                    Réalisateur : <?php echo $distr['director']; ?><br>
                    Durée : <?php echo isset($distr['duration']) ? $distr['duration'] . " min" : 'Données non disponibles'; ?><br>
                    Date de sortie : <?php echo date('d/m/Y', strtotime($distr['dates'])); ?><br>
                    Genre : <?php echo $distr['genre']; ?><br>
                </li>
            <?php endforeach; ?>   
        </ul>
    <?php elseif ($selected_distributor): ?>
        <p>Aucun film trouvé pour ce distributeur.</p>
    <?php endif; ?>
    </div>
     
</main>


    <script src="main.js"></script>
</body>
</html>
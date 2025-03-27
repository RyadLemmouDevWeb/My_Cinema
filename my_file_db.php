<?php
$servername = 'localhost';
$username = 'ryadsql';
$password = 'Onepiece1997';
$database = 'cinema';

$conn = new mysqli($servername, $username, $password, $database);

function rechercherFilms($search) {
    global $conn; 

    $sql = "SELECT movie.title AS movie, movie.director AS director, movie.release_date AS dates, movie.duration AS duration, genre.name AS genre, distributor.name AS distributor FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON movie_genre.id_genre = genre.id JOIN distributor ON movie.id_distributor = distributor.id WHERE movie.title LIKE ? ORDER BY movie.title;";

    $stmt = $conn->prepare($sql);

    $search = "%" . $search . "%";
    $stmt->bind_param("s", $search);
    $stmt->execute();

    $result = $stmt->get_result();
    $films = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $films[] = $row;
        }
    }

    $stmt->close();

    return $films;
}


function getDistributors() {
    global $conn;
    $sql = "SELECT id, name FROM distributor";
    $result = $conn->query($sql);
    $distributors = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $distributors[] = $row;
        }
    }
    return $distributors;
}

function getFilmsByDistributor($distributor_id) {
    global $conn;
    $sql = "SELECT movie.title AS movie, movie.director AS director, movie.release_date AS dates, movie.duration AS duration, genre.name AS genre, distributor.name AS distributor FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON movie_genre.id_genre = genre.id JOIN distributor ON movie.id_distributor = distributor.idWHERE distributor.id = ORDER BY movie.title";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $distributor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $films = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $films[] = $row;
        }
    }
    $stmt->close();
    return $films;
}

$distributors = getDistributors();

$selected_distributor = isset($_GET['distributor']) ? $_GET['distributor'] : '';
$films = [];
if ($selected_distributor) {
    $films = getFilmsByDistributor($selected_distributor);
}

function rechercheNom($searchuser){
    global $conn;

    $cmdsql = "SELECT user.firstname, user.lastname, user.address, user.zipcode, user.city, subscription.name AS subscriptionName, subscription.price AS subscriptionPrice, subscription.duration AS subscriptionDuration, membership.date_begin AS subscriptionStartDate FROM user LEFT JOIN membership  ON user.id = membership.id_user LEFT JOIN subscription  ON membership.id_subscription = subscription.id WHERE user.firstname LIKE ? OR user.lastname LIKE ? ORDER BY user.lastname;";

    $prep = $conn->prepare($cmdsql);

    $searchuser = "%" . $searchuser . "%";
    $prep->bind_param("ss", $searchuser, $searchuser); 
    $prep->execute();

    $resultname = $prep->get_result();
    $names = [];

    if($resultname->num_rows > 0){
        while($rows = $resultname->fetch_assoc()){
            $names[] = $rows;
        }
    }

    $prep->close();

    return $names;
}

function filtreGenre($searchgenre) {
    global $conn;

    $cmdsqlgenre = "SELECT movie.title AS movie, genre.name AS genre, distributor.name AS distributor, movie.director AS director, movie.release_date AS dates, movie.duration AS duration FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON movie_genre.id_genre = genre.id JOIN distributor ON movie.id_distributor = distributor.id WHERE genre.name LIKE ? ORDER BY movie.title;";

    $prepa = $conn->prepare($cmdsqlgenre);

    $searchgenre = "%" . $searchgenre . "%";
    $prepa->bind_param("s", $searchgenre);

    $prepa->execute();

    $resultgenre = $prepa->get_result();
    $genre = [];

    if ($resultgenre->num_rows > 0) {
        while ($rows = $resultgenre->fetch_assoc()) {
            $genre[] = $rows;
        }
    }

    $prepa->close();

    return $genre;
}

function getFilms() {
    global $conn;
    $films = [];
    $sql = "SELECT id, title FROM movie ORDER BY title";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $films[] = $row;
        }
    }
    return $films;
}

function ajouterSeance($movie_id, $schedule_date, $room) {
    global $conn;

    $sql = "INSERT INTO movie_schedule (id_movie, date_begin, id_room) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("iss", $movie_id, $schedule_date, $room);

    $result = $stmt->execute();

    $stmt->close();

    return $result;
}




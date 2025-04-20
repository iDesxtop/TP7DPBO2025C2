<?php
require_once 'class/Publisher.php';
require_once 'class/Genre.php';
require_once 'class/Game.php';

$publisher = new Publisher();
$genre = new Genre();
$game = new Game();
if (isset($_POST['delete_publisher'])) {
    $publisher->deletePublisher($_POST['publisher_id']);
}
if (isset($_POST['delete_genre'])) {
    $genre->deleteGenre($_POST['genre_id']);
}
if (isset($_POST['delete_game'])) {
    $game->deleteGame($_POST['game_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gamestop System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Welcome to Gamestop System</h2>
        <nav>
            <a href="?page=publisher">Publisher</a> |
            <a href="?page=genre">Genre</a> |
            <a href="?page=game">Game</a> |
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'publisher') include 'view/publisher.php';
            elseif ($page == 'update_publisher') include 'view/update_publisher.php';
            elseif ($page == 'add_publisher') include 'view/add_publisher.php';

            elseif ($page == 'genre') include 'view/genre.php';
            elseif ($page == 'update_genre') include 'view/update_genre.php';
            elseif ($page == 'add_genre') include 'view/add_genre.php';

            elseif ($page == 'game') include 'view/game.php';
            elseif ($page == 'update_game') include 'view/update_game.php';
            elseif ($page == 'add_game') include 'view/add_game.php';
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>
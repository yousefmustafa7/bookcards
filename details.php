<?php
include('functions.php');
$flag_read = false;
if (isset($_POST['read'])) {
    $flag_read = true;
}


$id = $_GET['id'];


$json = file_get_contents("db/books.json");
$data = json_decode($json, true);

$book = find_obj($data, $id);


session_start();


if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.php");
    exit();
}

$username = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book details</title>
    <link rel="stylesheet" href="styles/details.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

</head>

<body>

    <header>
        <div>
            <h1><a href="index.php">IK-LIBRARY</a> > Book details</h1>
            <h3>Welcome <?php echo $_SESSION['user']; ?>!</h3>
        </div>

        <div class="user-section">
            <?php if ($_SESSION['user'] == 'admin') {
                echo "<a href=\"add_book.php\"><button class = \"logout-button\"><b>+Add book</b></button></a>";
            } ?>
            <a href="?logout"><button class="logout-button"><b>Log out</b></button></a>

        </div>

    </header>

    <div class="book-container">

        <img src="assets/<?php echo $book['image'] ?>" alt="">
        <div class="book-info">
            <h1><?php echo $book['title'] ?>
            </h1>
            <p><b>Author: </b> <?php echo $book['author'] ?></p>
            <p class="description"><b>Description: </b> <?php echo $book['description'] ?></p>
            <p><b>Publication year: </b><?php echo $book['year'] ?></p>
            <p><b>Source planet: </b><?php echo $book['planet'] ?></p>
            <br><br>

    </div>

    <footer>
        <p>IK-Library | ELTE IK Webprogramming</p>
    </footer>
</body>



</html>
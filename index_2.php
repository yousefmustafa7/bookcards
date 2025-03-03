<?php


if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.php");
    exit();
}


if (isset($_GET['register'])) {
    session_destroy();
    header("location: register.php");
    exit();
}

$json = file_get_contents("db/books.json");
$data = json_decode($json, true);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IK-Library | Home</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/cards.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

</head>

<body>
    <header>
        <div>
            <h1><a href="index.php">IK-LIBRARY</a> > Home</h1>
            <h3>Welcome <?php echo "to IK LIBRARY!" ?></h3>
        </div>

        <div class="user-section">
            <a href="?logout"><button><b>Login</b></button></a>
            <a href="?register"><button><b>Register</b></button></a>

        </div>

    </header>
    <div id="content">

        <div id="card-list">
            <?php foreach ($data as $book) : ?>
                <div class="book-card-2">
                    <div class="book-title">
                        <h2><a class="book-link" href="details_2.php?id=<?php echo $book['id'] ?>"><?php echo $book['title'] ?></a></h2>
                    </div>

                    <div class="book-image-text">
                        <a href="details_2.php?id=<?php echo $book['id'] ?>"><img src="assets/<?php echo $book['image'] ?>" alt=""></a>

                        <div class="text"><?php echo $book['short_desc'] ?></div>
                    </div>

                    <div class="edit">
                        <span><a class="book-link" href="details_2.php?id=<?php echo $book['id'] ?>">Details</a></span>
                    </div>
                </div>
            <?php endforeach; ?>

            
        </div>
    </div>
    <footer>
        <p>IK-Library | ELTE IK Webprogramming</p>
    </footer>
</body>

</html>
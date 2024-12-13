<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="container">
        <header id="banner">
            <h1>PHP CRUD Assignment</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['user'])) {
                        echo '<li><a href="member.php">Member</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="register.php">Register</a></li>';
                        echo '<li><a href="contact.php">Contact</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <main>

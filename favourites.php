<?php
// Starting session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song information</title>

    <!-- link css file -->
    <link rel="stylesheet" href="resources/index.css">
</head>

<body>
    <!-- include header -->
    <?php include 'includes/header.html'; ?>
    <div class="main">
        <div class="">
            <table>
                <tr>
                    <th>title</th>
                    <th>artist</th>
                    <th>year</th>
                    <th>genre</th>
                    <th>popularity</th>
                    <th>Remove from favourite</th>
                    <th>View</th>
                </tr>
                <?php
                // print_r($_SESSION['favourites']);
                // check if session is set
                if (isset($_SESSION['favourites']) && !empty($_SESSION['favourites'])) {
                    // if session is set, loop through the array and display the song information
                    // cant set sessions with being limited not to use js :( just test data
                    // foreach ($_SESSION['favourites'] as $song) {
                    echo '
                        <tr>
                            <td>' . $_SESSION['favourites']['title'] . '</td>
                            <td>' . $_SESSION['favourites']['artistName'] . '</td>
                            <td>' . $_SESSION['favourites']['year'] . '</td>
                            <td>' . $_SESSION['favourites']['genreName'] . '</td>
                            <td>' . $_SESSION['favourites']['popularity'] . '</td>
                            <td><a href="favourites.php?remove=' . $_SESSION['favourites']['songId'] . '">Remove</a></td>
                            <td><a href="Browse/song.php?songId=' . $_SESSION['favourites']['songId'] . '">View</a></td>
                        
                    </tr>
                        
                    
                    
                </table>
            </div>';
                    // }
                } else {
                    // if session is not set, display a message
                    echo "<h1>You have no favourites yet!</h1>";
                }
                ?>
        </div>
        <!-- include footer -->
        <?php include 'includes/footer.html'; ?>
</body>

</html>
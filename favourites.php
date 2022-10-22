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
                // check if session is set
                if (isset($_SESSION['favourites'])) {
                    // if session is set, loop through the array and display the song information
                    // cant set sessions with being limited not to use js :( just test data
                    foreach ($_SESSION['favourites'] as $song) {
                        echo '
                        <tr>
                        <td>' . $song[0] . '</td>
                        <td>' . $song[1] . '</td>
                        <td>' . $song[2] . '</td>
                        <td>' . $song[3] . '</td>
                        <td>' . $song[4] . '</td>
                        <td><a href="song.php" class="button">Remove</a></td>
                        <td><a href="song.php?songId=' . $song[4] . '" class="button">View</a></td>
                    </tr>
                        
                    
                    
                </table>
            </div>';
                    }
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
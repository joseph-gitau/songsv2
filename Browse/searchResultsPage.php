<?php
// Starting session
session_start();

// fav song
$_SESSION['favourites'] = [];
$_SESSION['favourites'][] = ['song1', 'artist1', 'genre1', 'year1', 'popularity1'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search page</title>
    <!-- link css file -->
    <link rel="stylesheet" href="../resources/index.css">
</head>

<body>

    <!-- include header -->
    <?php include '../includes/header.html'; ?>
    <div class="main">
        <div class="results">
            <h1>Browse/Search results</h1>
            <?php
            // include database connection
            require '../data/db.php';
            //  check if the request is get
            if (isset($_GET['submit-search'])) {
                $title = $_GET['title'];
                $artist = $_GET['artist'];
                $genre = $_GET['genre'];
                $popularity = $_GET['popularity'];
                $year = $_GET['year'];
                $sql = "SELECT * FROM songs WHERE title LIKE '%$title%' AND popularity LIKE '%$popularity%' AND year LIKE '%$year%'";
                $results = $db->query($sql);

                /* $tot = 0;
                if ($tot > 0) { */
                while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                    // get genre id and name
                    $genreId = $row['genre_id'];
                    $sql1 = "SELECT * FROM genres WHERE genre_id = $genreId";
                    $results1 = $db->query($sql1);
                    $row1 = $results1->fetchArray(SQLITE3_ASSOC);
                    $genreName = $row1['genre_name'];
                    // get artist id and name
                    $artistId = $row['artist_id'];
                    $sql2 = "SELECT * FROM artists WHERE artist_id = $artistId";
                    $results2 = $db->query($sql2);
                    while ($row2 = $results2->fetchArray(SQLITE3_ASSOC)) {
                        $artistName = $row2['artist_name'];
                        // get artist type and type_name
                        $artistTypeId = $row2['artist_type_id'];
                        $sql3 = "SELECT * FROM types WHERE type_id = $artistTypeId";
                        $results3 = $db->query($sql3);
                        while ($row3 = $results3->fetchArray(SQLITE3_ASSOC)) {
                            $artistTypeName = $row3['type_name'];
                        }
                    }
                    echo '
                    <div class="container">
                        <div class="song">
                            <div class="song-info">
                                <a href="song.php?songId=' . $row['song_id'] . '">
                                <h3>song title:</b> ' . $row['title'] . ' </h3>
                                </a>
                        </div>
                    </div>
                    ';
                }
                /* } else {
                    echo '<h3>No results found</h3>';
                } */
            }
            ?>
            <div class="">
                <table>
                    <tr>
                        <th>title</th>
                        <th>artist</th>
                        <th>year</th>
                        <th>genre</th>
                        <th>popularity</th>
                        <th>Add to favourite</th>
                        <th>View</th>
                    </tr>
                    <?php
                    // select all songs
                    $sql = "SELECT * FROM songs";
                    $results = $db->query($sql);
                    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                        // get genre id and name
                        $genreId = $row['genre_id'];
                        $sql1 = "SELECT * FROM genres WHERE genre_id = $genreId";
                        $results1 = $db->query($sql1);
                        $row1 = $results1->fetchArray(SQLITE3_ASSOC);
                        $genreName = $row1['genre_name'];
                        // get artist id and name
                        $artistId = $row['artist_id'];
                        $sql2 = "SELECT * FROM artists WHERE artist_id = $artistId";
                        $results2 = $db->query($sql2);
                        while ($row2 = $results2->fetchArray(SQLITE3_ASSOC)) {
                            $artistName = $row2['artist_name'];
                        }
                        echo '
                        <tr>
                        <td>' . $row['title'] . '</td>
                        <td>' . $artistName . '</td>
                        <td>' . $row['year'] . '</td>
                        <td>' . $genreName . '</td>
                        <td>' . $row['popularity'] . '</td>
                        <td><a href="song.php" class="button">Add</a></td>
                        <td><a href="song.php?songId=' . $row['song_id'] . '" class="button">View</a></td>
                    </tr>
                        ';
                    }
                    ?>
                    <!-- <tr>
                        <td>song title</td>
                        <td>artist name</td>
                        <td>year</td>
                        <td>genre</td>
                        <td>popularity</td>
                        <td><a href="song.php" class="button">Add</a></td>
                        <td><a href="edit.php" class="button">View</a></td>
                    </tr> -->
                </table>
            </div>
        </div>
    </div>
    <!-- include footer -->
    <?php include '../includes/footer.html'; ?>
</body>

</html>
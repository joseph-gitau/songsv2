<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song information</title>

    <!-- link css file -->
    <link rel="stylesheet" href="../resources/index.css">
</head>

<body>
    <!-- include header -->
    <?php include '../includes/header.html'; ?>
    <div class="main">
        <!-- testing song id = 1002 -->
        <?php
        // include database connection
        require '../data/db.php';
        $songId = $_GET['songId'];
        $sql = "SELECT * FROM songs WHERE Song_id = $songId";
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
                // get artist type and type_name
                $artistTypeId = $row2['artist_type_id'];
                $sql3 = "SELECT * FROM types WHERE type_id = $artistTypeId";
                $results3 = $db->query($sql3);
                while ($row3 = $results3->fetchArray(SQLITE3_ASSOC)) {
                    $artistTypeName = $row3['type_name'];
                }
            }
            echo '
            <div class="intro">
                <h1>Song information</h1>

            </div>
            <div class="container">
                <div class="song">
                    <div class="song-info">
                        <h3>song title:</b> ' . $row['title'] . ' </h3>
                        <p><b>artist name:</b> ' . $artistName . '</p>
                        <p style="padding-left: 20px;"><b>artist type:</b> ' . $artistTypeName . '</p>
                        <p><b>song genre:</b> ' . $genreName . ' </p>
                        <p><b>Year:</b> ' . $row['year'] . '</p>
                        <p><b>bpm:</b> ' . $row['bpm'] . '</p>
                        <p><b>energy:</b> ' . $row['energy'] . '</p>
                        <p><b>dancerbility:</b> ' . $row['danceability'] . '</p>
                        <p><b>loudness:</b> ' . $row['loudness'] . '</p>
                        <p><b>Liveness:</b> ' . $row['liveness'] . '</p>
                        <p><b>Valence:</b> ' . $row['valence'] . '</p>
                        <p><b>Duration:</b> ' . gmdate("H:i:s", $row['duration']) . ' minutes</p>
                        <p><b>Acousticness:</b> ' . $row['acousticness'] . '</p>
                        <p><b>Speechiness:</b> ' . $row['speechiness'] . '</p>
                        <p><b>Popularity:</b> ' . $row['popularity'] . '</p>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
        <!-- <div class="intro">
            <h1>Song information</h1>

        </div>
        <div class="container">
            <div class="song">
                <div class="song-info">
                    <h3>song title:</b> </h3>
                    <p><b>artist name:</b> </p>
                    <p style="padding-left: 20px;"><b>artist type:</b> </p>
                    <p><b>song genre:</b> </p>
                    <p><b>Year:</b> </p>
                    <p><b>bpm:</b> </p>
                    <p><b>energy:</b> </p>
                    <p><b>dancerbility:</b> </p>
                    <p><b>loudness:</b> </p>
                    <p><b>Liveness:</b> </p>
                    <p><b>Valence:</b> </p>
                    <p><b>Duration:</b> </p>
                    <p><b>Acousticness:</b> </p>
                    <p><b>Speechiness:</b> </p>
                    <p><b>Popularity:</b> </p>
                </div>
            </div>
        </div> -->
    </div>
    <!-- include footer -->
    <?php include '../includes/footer.html'; ?>
</body>

</html>
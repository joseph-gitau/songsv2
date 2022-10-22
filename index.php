<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP 3512 Assign1.</title>
    <!-- link css file -->
    <link rel="stylesheet" href="resources/index.css">
</head>

<body>
    <!-- include header -->
    <?php include 'includes/header.html'; ?>
    <div class="main">
        <div class="intro">
            <h1>COMP 3512 Assignment 1</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ipsum, accusamus sit temporibus iusto doloremque aut similique expedita quis. Unde deleniti odit nemo culpa ad est ullam rem, sapiente libero?</p>
        </div>
        <div class="container-main">
            <!-- test mmmh -->
            <!-- <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="card">
                    <h3>Top genres</h3>
                    <div class="list">
                        <ul>
                            <li><a href="browse.php?genre=Rock">Rock</a></li>
                            <li><a href="browse.php?genre=Pop">Pop</a></li>
                            <li><a href="browse.php?genre=Jazz">Jazz</a></li>
                            <li><a href="browse.php?genre=Classical">Classical</a></li>
                            <li><a href="browse.php?genre=Country">Country</a></li>
                            <li><a href="browse.php?genre=Blues">Blues</a></li>
                            <li><a href="browse.php?genre=Reggae">Reggae</a></li>
                            <li><a href="browse.php?genre=Latin">Latin</a></li>
                            <li><a href="browse.php?genre=World">World</a></li>
                            <li><a href="browse.php?genre=Electronic">Electronic</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?> -->
            <!-- top genres ----------------------------------------------->
            <?php
            // include database connection
            require 'data/db.php';
            // query to get the top 10 genres
            $sql = "SELECT song_id, title, COUNT(*) AS count FROM songs GROUP BY genre_id ORDER BY count DESC LIMIT 10";
            // execute the query
            $results = $db->query($sql);
            echo '<div class="card">
                    <h3>Top genres</h3>
                    <div class="list">
                        <ol>
                ';

            while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                echo '
                <li><a href="Browse/song.php?songId=' . $row['song_id'] . '">' . $row['title'] . '</a></li>
                ';
            }
            echo '</ol>
                    </div>
                </div>';

            // <!-- top artists ----------------------------------------------->

            echo '<div class="card">
                    <h3>Top artists</h3>
                    <div class="list">
                        <ol>
                ';
            $sql2 = "SELECT s.song_id, s.artist_id, s.title FROM songs s INNER JOIN artists a ON a.artist_id = s.artist_id GROUP BY s.artist_id ORDER BY COUNT(*) DESC LIMIT 10";
            $results2 = $db->query($sql2);
            while ($row2 = $results2->fetchArray(SQLITE3_ASSOC)) {
                // get artist name
                $sql22 = "SELECT artist_name FROM artists WHERE artist_id = " . $row2['artist_id'];
                $results22 = $db->query($sql22);
                $row22 = $results22->fetchArray(SQLITE3_ASSOC);
                $artistName22 = $row22['artist_name'];
                echo '
                <li><a href="Browse/song.php?songId=' . $row2['song_id'] . '">' . $artistName22 . '</a></li>
                ';
            }
            echo '</ol>
                    </div>
                </div>';
            // <!-- most popular songs ----------------------------------------------->
            echo '<div class="card">
                    <h3>Most popular songs</h3>
                    <div class="list">
                        <ol>
                ';
            $sql3 = "SELECT song_id, title, COUNT(*) AS count FROM songs GROUP BY popularity ORDER BY count DESC LIMIT 10";
            $results3 = $db->query($sql3);
            while ($row3 = $results3->fetchArray(SQLITE3_ASSOC)) {
                echo '
                <li><a href="Browse/song.php?songId=' . $row3['song_id'] . '">' . $row3['title'] . '</a></li>
                ';
            }
            echo '</ol>
                    </div>
                </div>';
            // <!-- one hit wonders ----------------------------------------------->
            echo '<div class="card">
                    <h3>One hit wonders</h3>
                    <div class="list">
                        <ol>
                ';
            $sql4 = "SELECT song_id, title, COUNT(*) AS count FROM songs GROUP BY artist_id ORDER BY count ASC LIMIT 10";
            $results4 = $db->query($sql4);
            while ($row4 = $results4->fetchArray(SQLITE3_ASSOC)) {
                echo '
                <li><a href="Browse/song.php?songId=' . $row4['song_id'] . '">' . $row4['title'] . '</a></li>
                ';
            }
            echo '</ol>
                    </div>
                </div>';
            // <!-- longest acoustic songs above 4 ----------------------------------------------->
            echo '<div class="card">
                    <h3>Longest acoustic songs </h3>
                    <div class="list">
                        <ol>
                ';
            $sql5 = "SELECT song_id, title, duration FROM songs WHERE duration > 240 AND acousticness > 0.5 ORDER BY duration DESC LIMIT 10";
            $results5 = $db->query($sql5);
            while ($row5 = $results5->fetchArray(SQLITE3_ASSOC)) {
                echo '
                <li><a href="Browse/song.php?songId=' . $row5['song_id'] . '">' . $row5['title'] . '</a></li>
                ';
            }
            echo '</ol>
                    </div>
                </div>';
            ?>
            <!-- nw -->
        </div>
    </div>

    <!-- include footer -->
    <?php include 'includes/footer.html'; ?>
</body>

</html>
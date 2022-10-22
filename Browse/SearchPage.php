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

        <div class="search">
            <h1>Basic song search</h1>
            <form action="searchResultsPage.php" method="GET">
                <div class="form-control">
                    <input type="radio" name="search" placeholder="Search for a song">
                    <label for="title">Song title</label>
                    <input type="text" name="title" placeholder="Search by song title">
                </div>
                <!-- artist -->
                <div class="form-control">
                    <input type="radio" name="search" placeholder="Search for an artist">
                    <label for="artist">Artist name</label>
                    <input type="text" name="artist" placeholder="Search by an artist">
                </div>
                <!-- genre -->
                <div class="form-control">
                    <input type="radio" name="search" placeholder="Search for a genre">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" placeholder="Search for a genre">
                </div>
                <!-- year and popularity -->
                <div class="row">
                    <div class="form-control">
                        <input type="radio" name="search" placeholder="Search for a year">
                        <label for="year">Year</label>
                        <input type="number" name="year" placeholder="Search by year">
                    </div>
                    <div class="form-control">
                        <input type="radio" name="search" placeholder="Search for a popularity">
                        <label for="popularity">Popularity</label>
                        <input type="number" name="popularity" placeholder="Search by popularity">
                    </div>
                </div>

                <button type="submit" name="submit-search" class="btn">Search</button>
            </form>
        </div>

    </div>
    <!-- include footer -->
    <?php include '../includes/footer.html'; ?>
</body>

</html>
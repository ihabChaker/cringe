<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css?v=1">
    <title>Document</title>
</head>

<body>

    <div class="navbar">
        <a class="active" href="./login.php">login</a>
    </div>

    <center>
        <h1 class="title">
            L'école de Formation
        </h1>

        <div class="slider-container">
            <div class="image-container">
                <img src="./assets/img/1.jpg" alt="" class="slider-image">
                <img src="./assets/img/2.jpg" alt="" class="slider-image">
                <img src="./assets/img/3.jpg" alt="" class="slider-image">
                <img src="./assets/img/4.jpg" alt="" class="slider-image">
            </div>
        </div>
        <h3> Les formations disponibles: </h3>

        <ul class="formations">
            <?php
            $con = "mysql:dbname=tdw_php;host=127.0.0.1;";
            try {
                $exec = new PDO($con, "root", "");
            } catch (PDOException $e) {
                printf("error");
                exit();
            }
            $query = "SELECT * FROM info_formation";
            foreach ($exec->query($query) as $row) {
                echo "<li>" . $row["nom_formation"] . "</li>";
            }
            ?>
        </ul>

        <video width="800" height="700" controls>
            <source src="./assets/video/v1.mkv" type="video/mp4">
        </video>
        <p>contactez nous en clicant ce <a class="lien" href="mailto: ecole@ecole.com">lien</a>
        </p>
        <table class="tableau">
            <thead>
                <th>Formation</th>
                <th>Volume Horaire </th>
                <th>HT</th>
                <th>Tax </th>
                <th>TTC</th>
            </thead>
            <tbody>
                <?php
                $con = "mysql:dbname=tdw_php;host=127.0.0.1;";
                try {
                    $exec = new PDO($con, "root", "");
                } catch (PDOException $e) {
                    printf("error");
                    exit();
                }
                foreach ($exec->query($query) as $row) {
                    $prix = $row["prix"];
                    $taxe =  $row["taxe"];
                    $ttc = (($prix * $taxe) / 100) + $prix;
                    echo '<tr> <td>' . $row["nom_formation"] . " </td> <td> " . $row["vh"] . " </td> <td> " . $row["prix"] . " </td> <td> " . $row["taxe"] .  " </td> <td> " . $ttc . '</td>  </tr>';
                }

                ?>
            </tbody>
        </table>
    </center>
    <br />
    <br />
    <br />

</body>

</html>
<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["USER"])) {
    echo "<h1>You need to LOGIN first !!</h1>
    ";
    exit();
}
if (isset($_POST["logout"])) {
    session_unset();
    header("Location: login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/admin.css?v=1">
    <title>Document</title>
</head>

<body>
    <div class="navbar">
        <form action="./admin.php" method="post">
            <input type="submit" value="Logout" class="active" name="logout" />
        </form>
    </div>
    <div></div>
    <h1 class="title">Ajout</h1>
    <form action="./admin.php" method="POST" class="ajout">
        <label for="nom">nom</label>
        <input type="text" name="nom" class="i">

        <label for="vh">volume horaire</label>
        <input type="number" name="vh" class="i">

        <label for="prix">prix</label>
        <input type="number" name="prix" class="i">

        <label for="tax">tax</label>
        <input type="number" name="tax" class="i">

        <input type="submit" value="submit" name="submit1" />
    </form>
    <div></div>
    <h1 class="title">Supression</h1>
    <form action="./admin.php" method="POST" class="supp">
        <label for="nom">nom</label>
        <input type="text" name="nom_supp" class="i">
        <input type="submit" value="submit" name="submit2" />
    </form>
    <div></div>
    <h1 class="title">Modification</h1>
    <form action="./admin.php" method="POST" class="modif">
        <label for="nom">nom</label>
        <input type="text" name="nom_modif" class="i">
        <div></div>
        <br>
        <label for="nom">nom</label>
        <input type="text" name="nv-nom" class="i">

        <label for="vh">volume horaire</label>
        <input type="number" name="nv-vh" class="i">

        <label for="prix">prix</label>
        <input type="number" name="nv-prix" class="i">

        <label for="tax">tax</label>
        <input type="number" name="nv-tax" class="i">
        <input type="submit" value="submit" name="submit3" />
    </form>
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
            echo "<ul>";
            $query = "SELECT * FROM info_formation";
            foreach ($exec->query($query) as $row) {
                $prix = $row["prix"];
                $taxe =  $row["taxe"];
                $ttc = (($prix * $taxe) / 100) + $prix;
                echo '<tr> <td>' . $row["nom_formation"] . " </td> <td> " . $row["vh"] . " </td> <td> " . $row["prix"] . " </td> <td> " . $row["taxe"] .  " </td> <td> " . $ttc . '</td>  </tr>';
            }

            echo "</ul>";
            if (isset($_POST["submit1"])) {
                $query = $exec->prepare("INSERT INTO info_formation (nom_formation,vh,prix,taxe) VALUE (?,?,?,?)");
                $query->bindParam(1, $_POST["nom"]);
                $query->bindParam(2, $_POST["vh"]);
                $query->bindParam(3, $_POST["prix"]);
                $query->bindParam(4, $_POST["tax"]);
                $query->execute();
            }
            if (isset($_POST["submit2"])) {
                $query = $exec->prepare("DELETE FROM info_formation WHERE nom_formation = ?");
                $query->bindParam(1, $_POST["nom_supp"]);
                $query->execute();
            }
            if (isset($_POST["submit3"])) {
                $query = $exec->prepare("UPDATE info_formation SET nom_formation=?,vh=?,prix=?,taxe=? WHERE nom_formation=?");
                $query->bindParam(1, $_POST["nv-nom"]);
                $query->bindParam(2, $_POST["nv-vh"]);
                $query->bindParam(3, $_POST["nv-prix"]);
                $query->bindParam(4, $_POST["nv-tax"]);
                $query->bindParam(5, $_POST["nom_modif"]);
                $query->execute();
            }
            ?>
        </tbody>
    </table>

</body>

</html>
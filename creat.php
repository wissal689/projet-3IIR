<?php
$errorMsg = "";
$fnameValue = "";
$lnameValue = "";
$emailValue = "";
$successMsg = "";

include("connection.php");
$connection = new Connection();
include("client.php");
$connection->selectDatabase("wissalpoo");

if (isset($_POST['submit'])) {
    $fnameValue = $_POST['firstName'];
    $lnameValue = $_POST['lastName'];
    $emailValue = $_POST['email'];
    $passValue = $_POST['password'];
    $idCityValue = $_POST['cities'];

    if (empty($fnameValue) || empty($lnameValue) || empty($emailValue) || empty($passValue)) {
        $errorMsg = "All fields must be filled in";
    } else if (strlen($passValue) < 8) {
        $errorMsg = "Password must contain at least 8 characters";
    } else if (preg_match('/[A-Z]+/', $passValue) == 0) {
        $errorMsg = "Password must contain at least one capital letter";
    } else {
        $client = new Client($fnameValue, $lnameValue, $emailValue, $passValue, $idCityValue);
        $client->insertClient("clients", $connection->conn);
        $errorMsg = Client::$errorMsg;
        $successMsg = Client::$successMsg;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - EMSI Cahier de Texte</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Navigation -->
<nav>
    <div class="logo">EMSI</div>
    <ul class="nav-links">
    <li><a href="home.php">Accueil</a></li>
            <li><a href="#cahier">Cahier de Texte</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="creat.php">sign up</a></li>
    </ul>
</nav>

<!-- Page d'Accueil -->
<header id="home" class="hero">
    <h1>Bienvenue sur le Cahier de Texte EMSI</h1>
    <p>Une interface moderne pour gérer vos cours et tâches facilement</p>
    <a href="#signup" class="cta">S'inscrire</a>
</header>

<!-- Sign Up Form -->
<section id="signup" class="container my-5">
    <h2>S'inscrire</h2>

    <?php
    if (!empty($errorMsg)) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong> $errorMsg</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }

    if (!empty($successMsg)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong> $successMsg</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
    ?>

    <form method="post">
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="fname">First Name:</label>
            <div class="col-sm-6">
                <input value="<?php echo $fnameValue ?>" class="form-control" type="text" id="fname" name="firstName">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="lname">Last Name:</label>
            <div class="col-sm-6">
                <input value="<?php echo $lnameValue ?>" class="form-control" type="text" id="lname" name="lastName">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="email">Email:</label>
            <div class="col-sm-6">
                <input value="<?php echo $emailValue ?>" class="form-control" type="email" id="email" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="cities">Cities:</label>
            <div class="col-sm-6">
                <select name='cities' class="form-select">
                    <option selected>Select your city</option>
                    <?php
                    include("City.php");
                    $cities = City::selectAllCities('Cities', $connection->conn);
                    foreach ($cities as $city) {
                        echo "<option value='$city[id]' >$city[cityName]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-form-label col-sm-1" for="password">Password:</label>
            <div class="col-sm-6">
                <input class="form-control" type="password" id="password" name="password">
            </div>
        </div>
        <div class="row mb-3">
            <div class="offset-sm-1 col-sm-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
            <div class="col-sm-1 col-sm-3 d-grid">
                <a class="btn btn-outline-primary">Login</a>
            </div>
        </div>
    </form>
</section>

<!-- Cahier de Texte Section -->
<section id="cahier" class="cahier">
    <h2>Cahier de Texte des Professeurs</h2>
    <div class="tasks">
        <div class="task">
            <h3>Mathematics</h3>
            <p><strong>Examen :</strong> 15 Décembre</p>
            <p><strong>Description :</strong> Révision de tous les chapitres.</p>
        </div>
        <div class="task">
            <h3>Informatique</h3>
            <p><strong>Examen :</strong> 18 Décembre</p>
            <p><strong>Description :</strong> Finalisation du projet de programmation.</p>
        </div>
        <div class="task">
            <h3>Physique</h3>
            <p><strong>Examen :</strong> 20 Décembre</p>
            <p><strong>Description :</strong> Révision sur les lois de Newton.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact">
    <p>EMSI - École Marocaine des Sciences de l'Ingénieur</p>
</footer>

</body>
</html>

<?php
session_start();
$_SESSION["prenom"] = "wissal";
$_SESSION["nom"] = "zi";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        Bienvenue
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Bonjour, <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?>!</h5>
                        <p class="card-text">Vous êtes sur la page d'accueil. Profitez de votre visite!</p>
                        
                    </div>
                    <div class="card-footer text-muted">
                        Merci de votre visite!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```


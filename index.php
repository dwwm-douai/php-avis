<?php
    require 'helpers.php';

    $restaurants = select('select * from restaurants');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les restaurants</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Les avis</h1>
        <div class="row pt-4">
            <?php foreach ($restaurants as $restaurant) { ?>
            <div class="col-lg-3">
                <a href="avis.php?id=<?= $restaurant['id']; ?>">
                    <div class="card">
                        <img class="card-img-top" src="<?= $restaurant['image']; ?>" alt="<?= $restaurant['name']; ?>">
                        <div class="card-body">
                            <?= $restaurant['name']; ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

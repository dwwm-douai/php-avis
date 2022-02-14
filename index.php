<?php
    require 'helpers.php';

    // Formulaire
    $name = post('name');
    $review = post('review');
    $note = post('note');
    $errors = [];
    $success = null;

    if (submit()) {
        if (empty($name)) {
            $errors[] = 'Votre nom est requis.';
        }

        if (empty($review)) {
            $errors[] = 'Votre commentaire est requis.';
        }

        if ($note < 1 || $note > 5) {
            $errors[] = 'Votre note doit être entre 1 et 5.';
        }

        if (empty($errors)) {
            insert('insert into reviews (name, review, note) values (:name, :review, :note)', [
                'name' => $name,
                'review' => $review,
                'note' => $note,
            ]);

            $success = 'Votre commentaire a bien été ajouté.';
        }
    }

    // Les avis
    /* $reviews = [
        ['name' => 'Fiorella Mota', 'review' => 'Très bon restaurant', 'note' => 5, 'created_at' => '2022-02-09 11:43:12'],
        ['name' => 'Marina Mota', 'review' => 'Super restaurant', 'note' => 4, 'created_at' => '2022-02-04 08:12:45'],
        ['name' => 'Matthieu Mota', 'review' => 'Mauvais restaurant', 'note' => 2, 'created_at' => '2022-02-06 18:23:54'],
    ]; */
    $reviews = select('SELECT * FROM reviews ORDER BY created_at DESC');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch'ti Restaurant</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-5">Ch'ti Restaurant</h1>

        <div class="card">
            <div class="card-header">Notre moyenne</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <h1 class="text-warning my-4">
                            <?= round(reviews_avg($reviews), 1); ?> / 5
                        </h1>
                        <div class="mb-3">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                            <i class="fas fa-star mr-1 <?= ($i < ceil(reviews_avg($reviews))) ? 'text-warning' : ''; ?>"></i>
                            <?php } ?>
                        </div>
                        <h3><?= count($reviews); ?> avis</h3>
                    </div>
                    <div class="col-lg-4">
                        <?php for ($i = 5; $i > 0; $i--) { ?>
                        <div class="row align-items-center">
                            <div class="col">
                                <?= $i; ?> <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= reviews_percentage_note($reviews, $i); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(<?= reviews_count_note($reviews, $i); ?>)</div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h3 class="mt-4 mb-3">Laissez votre avis</h3>
                        <button type="button" class="btn btn-primary">Noter</button>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($success) { ?>
            <div class="alert alert-success mt-5">
                <?= $success; ?>
            </div>
            <a href="index.php">Ajouter un autre commentaire</a>
        <?php } else { ?>
            <div class="card mt-5">
                <div class="card-header">Publier un avis</div>
                <div class="card-body">
                    <?php if (!empty($errors)) { ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error) { ?>
                                    <li><?= $error; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="name" class="col-lg-4 col-form-label text-lg-end">Nom</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom" value="<?= $name; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="review" class="col-lg-4 col-form-label text-lg-end">Commentaire</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="review" id="review" placeholder="Votre commentaire"><?= $review; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                            <label for="note" class="col-lg-4 col-form-label text-lg-end">Note</label>
                            <div class="col-lg-6">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="note" id="note-<?= $i; ?>" value="<?= $i; ?>">
                                    <label class="form-check-label" for="note-<?= $i; ?>"><?= $i; ?></label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-lg-6 offset-lg-4">
                                <button class="btn btn-primary">Noter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
        
        <div class="py-5">
            <?php foreach ($reviews as $review) { ?>
            <div class="row mb-5">
                <div class="col-lg-1">
                    <div class="rounded-circle bg-warning text-white avatar">
                        <h3 class="text-center"><?= $review['name'][0]; ?></h3>
                    </div>
                </div>
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header"><?= $review['name']; ?></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <i class="fas fa-star mr-1 <?= ($i < $review['note']) ? 'text-warning' : ''; ?>"></i>
                                    <?php } ?>
                                    <p><?= $review['review']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end"><?= format_date($review['created_at']); ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

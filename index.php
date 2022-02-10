<?php
    require 'helpers.php';

    // Les avis
    $reviews = [
        ['name' => 'Fiorella Mota', 'review' => 'Très bon restaurant', 'note' => 5, 'created_at' => '2022-02-09 11:43:12'],
        ['name' => 'Marina Mota', 'review' => 'Super restaurant', 'note' => 4, 'created_at' => '2022-02-04 08:12:45'],
        ['name' => 'Matthieu Mota', 'review' => 'Mauvais restaurant', 'note' => 2, 'created_at' => '2022-02-06 18:23:54'],
    ];
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
                            3.3 / 5
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star mr-1 text-warning"></i>
                            <i class="fas fa-star mr-1 text-warning"></i>
                            <i class="fas fa-star mr-1 text-warning"></i>
                            <i class="fas fa-star mr-1 text-warning"></i>
                            <i class="fas fa-star mr-1 "></i>
                        </div>
                        <h3>4 avis</h3>
                    </div>
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                            <div class="col">
                                5 <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(1)</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                4 <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(1)</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                3 <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(0)</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                2 <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(2)</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                1 <i class="fas fa-star text-warning"></i>
                            </div>
                            <div class="col-8">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col">(0)</div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h3 class="mt-4 mb-3">Laissez votre avis</h3>
                        <button type="button" class="btn btn-primary">Noter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">Publier un avis</div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-lg-4 col-form-label text-lg-end">Nom</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="review" class="col-lg-4 col-form-label text-lg-end">Commentaire</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" name="review" id="review" placeholder="Votre commentaire"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="note" class="col-lg-4 col-form-label text-lg-end">Note</label>
                        <div class="col-lg-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="note" id="note-1" value="1">
                                <label class="form-check-label" for="note-1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="note" id="note-2" value="2">
                                <label class="form-check-label" for="note-2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="note" id="note-3" value="3">
                                <label class="form-check-label" for="note-3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="note" id="note-4" value="4">
                                <label class="form-check-label" for="note-4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="note" id="note-5" value="5">
                                <label class="form-check-label" for="note-5">5</label>
                            </div>
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

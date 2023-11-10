<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Detail Comics</h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover'] ?>" class="img-fluid rounded-start" alt="<?= $comic['title'] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title'] ?></h5>
                            <p class="card-text"><b>Author : </b> <?= $comic['author'] ?></p>
                            <p class="card-text"><small class="text-body-secondary"><b>Penerbit : </b> <?= $comic['publisher'] ?></small></p>

                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            <br><br>
                            <a href="/comics"><-- Back to comics list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
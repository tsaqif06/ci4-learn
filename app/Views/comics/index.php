<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Comics List</h1>
            <a href="/comics/create" class="btn btn-primary mb-3">Add Comic</a>
            <?php if (session()->getFlashData('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('message') ?>
                </div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($comics as $comic) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="/img/<?= $comic['cover'] ?>" width="100" alt="<?= $comic['slug'] ?>"></td>
                            <td><?= $comic['title'] ?></td>
                            <td>
                                <a href="/comics/<?= $comic['slug'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
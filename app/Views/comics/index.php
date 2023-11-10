<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Comics List</h1>
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
                    <?php foreach ($comics as $comic) : ?>
                        <tr>
                            <th scope="row"><?= $comic['id'] ?></th>
                            <td><img src="/img/<?= $comic['cover'] ?>" width="100" alt="<?= $comic['slug'] ?>"></td>
                            <td><?= $comic['title'] ?></td>
                            <td>
                                <a href="/comics/<?= $comic['slug'] ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
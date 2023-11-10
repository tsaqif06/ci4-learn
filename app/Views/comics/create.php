<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Form Add Comic</h1>
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="<?= old('title') ?>" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" id="title" name="title">
                    <div class="invalid-feedback">
                        <?= $validation->getError('title') ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" value="<?= old('author') ?>" class="form-control" id="author" name="author">
                </div>
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" value="<?= old('publisher') ?>" class="form-control" id="publisher" name="publisher">
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="text" value="<?= old('cover') ?>" class="form-control" id="cover" name="cover">
                </div>
                <!-- <div class="mb-3">
                    <label for="cover" class="form-label">Comic Cover</label>
                    <input class="form-control" type="file" name="cover" id="cover">
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
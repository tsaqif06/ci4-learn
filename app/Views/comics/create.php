<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if (session('validation')) : ?>
    <?= d(session('validation')->listErrors()) ?>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Form Add Comic</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="cover" class="form-label">Title</label>
                    <input type="text" value="<?= old('title') ?>" class="form-control <?= (session('validation')) ? 'is-invalid' : '' ?>" id="title" name="title">
                    <?php if (session('validation') && session('validation')->hasError('title')) : ?>
                        <div class="invalid-feedback">
                            <?= session('validation')->getError('title'); ?>
                        </div>
                    <?php endif; ?>
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
                    <label for="cover" class="form-label">Comic Cover</label>
                    <img src="/img/default.jpg" alt="default" width="150" class="d-block img-thumbnail img-preview">
                    <input class="form-control" type="file" id="cover" name="cover" accept="image/*" onchange="showPreview('cover')">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    const showPreview = (id) => {
        const image = document.querySelector(`#${id}`);
        const imgPreview = document.querySelector(".img-preview");

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = (oFREvent) => {
            imgPreview.src = oFREvent.target.result;
        };
    };
</script>
<?= $this->endSection() ?>
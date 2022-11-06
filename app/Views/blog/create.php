<div class="container">
    <h1>Create new posts</h1>
    <form action="<?= base_url('blog/save'); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" name="title" id="title" aria-describedby="titleFeedback" value="<?= old('title'); ?>">
            <div id="titleFeedback" class="invalid-feedback">
                <?= $validation->getError('title'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control <?= ($validation->hasError('body')) ? 'is-invalid' : ''; ?>" id="body" rows="3" name="body" aria-describedby="bodyFeedback"><?= old('body'); ?></textarea>
            <div id="bodyFeedback" class="invalid-feedback">
                <?= $validation->getError('body'); ?>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-2">Create</button>
        </div>
    </form>
</div>
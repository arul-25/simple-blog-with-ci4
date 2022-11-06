<section class="home">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success text-center alert-dismissible fade show mb-0">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">CI4 Blog!</h1>
            <p class="lead">This is blog created use Codeigniter 4.</p>
            <hr class="my-4">
            <p>Checkout how this blog build with Codeigniter 4 in this link.</p>
            <a class="btn btn-primary btn-lg" href="<?= base_url('create'); ?>" role="button">Create a Blog</a>
        </div>
    </div>
</section>


<section class="blog-section">
    <div class="container">
        <?php if ($news) : ?>
            <?php foreach ($news as $newsItems) : ?>
                <h3><a href="<?= base_url('post/' . $newsItems['slug']); ?>"><?= $newsItems['title']; ?></a></h3>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">No post have been found</p>
        <?php endif; ?>
    </div>
</section>
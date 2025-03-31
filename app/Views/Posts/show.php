<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= esc($title) ?></h1>
<p>
    <?= $post->content ?>
</p>
<br>
<div>
    <a href="<?= url_to("Posts::index") ?>">All Posts</a>
</div>
<?= $this->endSection() ?>
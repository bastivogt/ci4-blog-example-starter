<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= esc($title) ?></h1>
<p>
    Do you really want to delete Post #<?= $post["id"] ?>?
</p>
<form action="<?= url_to("Posts::delete", $post["id"]) ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit">Delete</button>
</form>
<br>
<div>
    <a href="<?= url_to("Posts::index") ?>">All Posts</a>
</div>
<?= $this->endSection() ?>
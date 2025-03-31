<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section("custom_styles") ?>
<style>
    .error {
        font-size: .8rem;
        color: red;
        margin-bottom: .5rem;
    }

    .required {
        color: red;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= $title ?></h1>
<?php if (session()->has("errors")): ?>
    <h3>Errors</h3>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<form action="<?= url_to("Posts::create") ?>" method="post">
    <?= csrf_field() ?>
    <?= $this->include("Posts/Partials/form") ?>
    <button type="submit">Create</button>
</form>
<br>
<div>
    <a href="<?= url_to("Posts::index") ?>">All Posts</a>
</div>
<?= $this->endSection() ?>
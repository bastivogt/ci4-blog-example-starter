<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= $title ?></h1>
<div>
    <a href="<?= url_to("Posts::new") ?>">New</a>
</div>
<?php if ($all_posts !== null): ?>
    <ul>
        <?php foreach ($all_posts as $post): ?>
            <li>
                <a href="<?= url_to("Posts::show", $post->id) ?>"><?= esc($post->title) ?></a>
                <a href="<?= url_to("Posts::edit", $post->id) ?>">[EDIT]</a>
                <a href="<?= url_to("Posts::deleteConfirm", $post->id) ?>">[DELETE]</a>
            </li>
        <?php endforeach ?>
    </ul>
<?php else: ?>
    <p>No Posts available.</p>
<?php endif ?>
<?= $this->endSection() ?>
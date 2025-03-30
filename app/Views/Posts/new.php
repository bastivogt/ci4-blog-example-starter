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
    <div>
        <label for="title">Title<span class="required">*</span></label>
        <input type="text" name="title" id="title" value="<?= old("title") ?>">
        <?php if (session()->has("errors")): ?>
            <?php if (array_key_exists("title", session("errors"))): ?>
                <div class="error">
                    <?= session("errors")["title"] ?>
                </div>
            <?php endif ?>
        <?php endif ?>

    </div>
    <div>
        <label for="content">Content<span class="required">*</span></label>
        <textarea name="content" id="content"><?= old("content") ?></textarea>
        <?php if (session()->has("errors")): ?>
            <?php if (array_key_exists("content", session("errors"))): ?>
                <div class="error">
                    <?= session("errors")["content"] ?>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
    <div>
        <label for="published">Published</label>
        <input type="checkbox" name="published" id="published" checked>
    </div>
    <button type="submit">Create</button>
</form>
<br>
<div>
    <a href="<?= url_to("Posts::index") ?>">All Posts</a>
</div>
<?= $this->endSection() ?>
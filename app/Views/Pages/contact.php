<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= $title ?></h1>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est deserunt voluptates perferendis pariatur quaerat, cum, similique doloremque, aspernatur vel quam soluta tenetur sed totam rerum sapiente accusantium iure quae tempora!</p>
<?= $this->endSection() ?>
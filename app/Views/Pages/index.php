<?= $this->extend("layouts/default") ?>

<?= $this->section("page_title") ?><?= $title ?><?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1><?= $title ?></h1>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat corrupti ad cupiditate deleniti et quasi minus expedita, obcaecati neque velit explicabo quia atque similique in quod labore amet exercitationem. Reprehenderit!</p>
<?= $this->endSection() ?>
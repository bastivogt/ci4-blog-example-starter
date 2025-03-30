<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Blog Example - <?= $this->renderSection("page_title") ?></title>

    <style>
        .message {
            background-color: green;
            color: white;
            padding: 20px;
            font-size: 1.5rem;
        }
    </style>
    <?= $this->renderSection("custom_styles") ?>
</head>

<body>
    <header>
        <h4>Header</h4>
        <?= $this->include("layouts/partials/nav") ?>
    </header>
    <?php if (session()->has("message")): ?>
        <section class="message">
            <?= session("message") ?>
        </section>
    <?php endif ?>
    <main>
        <?= $this->renderSection("content") ?>
    </main>
    <footer>
        <h4>Footer</h4>
    </footer>
</body>

</html>
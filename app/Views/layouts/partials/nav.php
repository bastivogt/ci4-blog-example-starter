<nav>
    <ul>
        <li><a href="<?= url_to("Pages::index") ?>">Home</a></li>
        <li><a href="<?= url_to("Pages::show", "about") ?>">About</a></li>
        <li><a href="<?= url_to("Pages::show", "contact") ?>">Contact</a></li>
        <li><a href="<?= url_to("Posts::index") ?>">Posts</a></li>
    </ul>
</nav>
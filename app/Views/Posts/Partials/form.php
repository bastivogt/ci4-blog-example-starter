<div>
    <label for="title">Title<span class="required">*</span></label>
    <input type="text" name="title" id="title" value="<?= old("title", esc($post->title)) ?>">
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
    <textarea name="content" id="content"><?= old("content", $post->content) ?></textarea>
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
    <input type="checkbox" name="published" id="published" <?php if ($post->published === "1"): ?>checked<?php endif ?>>
</div>
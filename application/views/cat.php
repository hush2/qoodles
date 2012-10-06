<?php include 'pages.php' ?>

<div class="row">
    <?php foreach ($authors as $author): ?>
    <div class='span2'>
        <?php foreach ($author as $au): ?>
        <?= anchor("/search/author/{$au->name}", $au->name) ?></br>
        <?php endforeach ?>
    </div>
    <?php endforeach ?>
</div>

<?php include 'pages.php' ?>

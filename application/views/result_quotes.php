<?php include 'pages.php' ?>

<div class='row'>
    <div class='span8'>

    <? foreach ($quotes as $quote): ?>
    <blockquote>
        <p> <?= $quote->quote ?><p>
        <small>
            <?= anchor("/search/author/{$quote->name}", $quote->name) ?>
            <?= anchor("/search/natcat/{$quote->nat}/{$quote->cat}", "{$quote->nat} {$quote->cat}", "class='natcat'") ?>
        </small>
    </blockquote>
    <?php endforeach ?>
    </div>
</div>

<?php include 'pages.php' ?>


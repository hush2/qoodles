<div class='row'>
    <div class='span8'>
    <?php foreach ($quotes as $quote): ?>
    <blockquote>
        <p class='quote'><?= $quote->quote ?><p>
        <small>
            <?= anchor("/search/author/{$quote->name}", $quote->name) ?>
            <?= anchor("/search/natcat/{$quote->nat}/{$quote->cat}", "{$quote->nat} {$quote->cat}", "class='natcat'") ?>
        </small>
    </blockquote>
    <?php endforeach ?>
    </div>
</div>



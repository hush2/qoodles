<p class='center'>
<?php foreach (range('A', 'Z') as $char): ?>
    <?php $active = $group == $char ? "class='active'" : '' ?>
    <?= anchor("/search/authors/{$char}", "&nbsp;{$char} ", $active) ?>
<?php endforeach ?>
</p>

<?php include 'pages.php' ?>

<div class='row'>
    <?php foreach ($authors as $auths): ?>
    <div class='span5'>
    <table>
    <?php foreach ($auths as $author): ?>
        <tr>
            <td><?= anchor("/search/author/{$author->name}", $author->name) ?></td>
            <td><?= anchor("/search/natcat/{$author->nat}/{$author->cat}", "{$author->nat} {$author->cat}", "class='natcat'") ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
    <?php endforeach ?>
</div>

<?php include 'pages.php' ?>

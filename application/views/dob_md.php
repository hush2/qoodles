<table class='span8'>
    <?php foreach ($authors as $author): ?>
    <tr>
    <td><?= anchor("/search/author/{$author->name}", $author->name) ?></td>
    <td><?= anchor("/search/natcat/{$author->nat}/{$author->cat}", "{$author->nat} {$author->cat}", "class='natcat'") ?></td>
    <td><?= anchor("/search/dob_yr/{$author->dob_yr}", "{$author->dob_yr} ") ?></td>
    </tr>
    <?php endforeach ?>
</table>

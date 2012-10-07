<?php include 'pages.php' ?>

<div class='row'>
    <table class='span9'>
        <tr><th>Name</th><th>Date of Birth</th><th>Date of Death</th></tr>
        <?php foreach ($authors as $author): ?>
        <tr>
        <td><?= anchor("/search/author/{$author->name}", $author->name) ?></td>
        <td class='dob'><?= anchor("/search/dob_md/{$author->dob_md}", " {$author->dob_md}") ?><?php echo $author->dob_md && $author->dob_yr ? ',' : '' ?>
            <?= anchor("/search/dob_yr/{$author->dob_yr}", " {$author->dob_yr}") ?>
        </td>
        <td class='dod'><?= anchor("/search/dod_md/{$author->dod_md}", " {$author->dod_md}") ?><?= $author->dod_md && $author->dod_yr ? ',' : '' ?>
            <?= anchor("/search/dod_yr/{$author->dod_yr}", " {$author->dod_yr}") ?></td>
        <?php endforeach ?>
    </table>
</div>

<?php include 'pages.php' ?>

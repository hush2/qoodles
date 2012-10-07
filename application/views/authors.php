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
            <?php
            $link =  $title = ' ';
            if ($author->nat && $author->cat)
            {
                $link  = "natcat/$author->nat/$author->cat";
                $title = "$author->nat $author->cat";
            }
            elseif ($author->nat && !$author->cat)
            {
                $link  = "nat/$author->nat";
                $title = "$author->nat";
            }
            elseif (!$author->nat && $author->cat)
            {
                $link  = "cat/$author->cat";
                $title = "$author->cat";
            }
            ?>
            <td><?= anchor("/search/$link", $title, 'class="natcat"') ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
    <?php endforeach ?>
</div>

<?php include 'pages.php' ?>

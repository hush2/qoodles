<?php include 'pages.php' ?>

<div class='row'>
    <div class='span8'>

    <? foreach ($quotes as $quote): ?>
    <blockquote>
        <p> <?= $quote->quote ?><p>
        <small>
            <?= anchor("/search/author/{$quote->name}", $quote->name) ?>
            <?php
            $link =  $title = ' ';
            if ($quote->nat && $quote->cat)
            {
                $link  = "natcat/$quote->nat/$quote->cat";
                $title = "$quote->nat $quote->cat";
            }
            elseif ($quote->nat && !$quote->cat)
            {
                $link  = "nat/$quote->nat";
                $title = "$quote->nat";
            }
            elseif (!$quote->nat && $quote->cat)
            {
                $link  = "cat/$quote->cat";
                $title = "$quote->cat";
            }
            ?>
            <?= anchor("/search/$link", $title, 'class="natcat"') ?></td>
        </small>
    </blockquote>
    <?php endforeach ?>
    </div>
</div>

<?php include 'pages.php' ?>


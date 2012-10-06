<div class='main_quote'>
    <blockquote>
        "<?= $quote->quote ?>"
        <small>
            <a href='search/author/<?= $quote->name ?>'><?= $quote->name ?></a>&nbsp;
            <a class='natcat' href='/search/natcat/<?= $quote->nat ?>/<?= $quote->cat ?>'><?= "{$quote->nat} {$quote->cat}"?></a>
        </small>
    </blockquote>
</div>

<div class='row center main_search'>

    <?= form_open(site_url('advanced_search/quotes')) ?>

        <input class='input-xlarge search-query' name='kw_any' type='text' placeholder='Enter any text' />
        <button class='btn btn-primary' type='submit' value='submit' name='submit'><i class='icon-search icon-white'></i> Search</button>
        &nbsp;<a class='adv' href='/advanced_search'>Advanced Search</a>

    <?= form_close() ?>
</div>

<h3 class='center'> Today is <?= date('F j') ?></h3>

<div class='row'>
    <div class='span4'>
        <strong><p class='center'>Born This Day<p></strong>
        <table class='table table-striped table-condensed'>
            <?php foreach ($authors_born as $author): ?>
                <tr>
                <td><a href='/search/author/<?= $author->name ?>'><?= $author->name ?></a></td>
                <td><a class='natcat' href='/search/natcat/<?= $author->nat ?>/<?= $author->cat ?>'><?= $author->nat ?> <?= $author->cat ?></a></td>
                <td><a href='/search/dob_yr/<?= $author->dob_yr ?>'><?= $author->dob_yr ?></a></td>
                </tr>
            <?php endforeach ?>
            <tr><td colspan='3'><a href='/search/dob_md'>More...</a></td></tr>
        </table>
    </div>

    <div class='offset1 span4'>
    <strong><p class='center'>Died This Day<p></strong>
    <table class='table table-striped table-condensed'>
        <?php foreach ($authors_died as $author): ?>
            <tr>
            <td><a href='/search/author/<?= $author->name ?>'><?= $author->name ?></a></td>
            <td><a class='natcat' href='/search/natcat/<?= $author->nat ?>/<?= $author->cat ?>'><?= $author->nat ?> <?= $author->cat ?></a></td>
            <td><a href='/search/dod_yr/<?= $author->dod_yr ?>'><?= $author->dod_yr ?></a></td>
            </tr>
        <?php endforeach ?>
        <tr><td colspan='3'><a href='/search/dod_md'>More...</a></td></tr>
    </table>
    </div>
</div>

<div class='row'>
    <?php foreach ($quote_short as $quote): ?>
    <div class='span3 small_quote'>
        <blockquote>
            "<?= $quote->quote ?>"
            <small><a href='/search/author/<?= $quote->name ?>'><?= $quote->name ?></a></small>
        </blockquote>
    </div>
    <?php endforeach ?>
</div>


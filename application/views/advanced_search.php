<?= form_open(site_url('advanced_search/quotes')) ?>

    <h2 class='adv'>Advanced Search</h2>

    <h3>Find quotes with...</h3><br />
    <p><label>all these words:</label><input type='text' class='span5 search-query' name='kw_all'></p>
    <p><label>this exact word or phrase:</label> <input type='text' class='span5 search-query' name='kw_exact'></p>
    <p><label>any of these words:</label><input type='text' class='span5 search-query' name='kw_any'></p>
    <p><label>none of these words:</label><input type='text' class='span5 search-query' name='kw_none'></p>
    <br/>
    <div class='offset2'>
        <button class='btn btn-primary' name='submit' type='submit' value='Search'><i class='icon-search icon-white'></i> Search</button>
    </div>

<?= form_close() ?>
    <hr/>

<?= form_open(site_url('advanced_search/authors')) ?>

    <h3>Find Authors</h3><br />
    <p><label>name:</label> <input type='text' class='span5 search-query' name='name'></p>
    <p><label>nationality:</label> <input type='text' class='span5 search-query' name='nat'></p>
    <p><label>profession:</label> <input type='text' class='span5 search-query' name='cat'></p>
    <p><label>born on month, day:</label><input type='text' class='span2 search-query' name='dob_md'></p>
    <p><label>born in year:</label><input type='text' class='span2 search-query' name='dob_yr'></p>
    <p><label>died on month, day:</label><input type='text' class='span2 search-query' name='dod_md'></p>
    <p><label>died in year:</label><input type='text' class='span2 search-query' name='dod_yr'></p>
    <br />
    <div class='offset2'>
        <button class='btn btn-primary' name='submit' type='submit' value='Search'><i class='icon-search icon-white'></i> Search</button>
    </div>

<?= form_close() ?>

    <hr/>
    <h3>Random Quotes</h3><br/>
    <label>Length of text:</label>
    <?= anchor('/search/random/short', 'Short') ?> <?= nbs(4) ?>
    <?= anchor('/search/random/average', 'Average') ?> <?= nbs(4) ?>
    <?= anchor('/search/random/long', 'Long') ?>


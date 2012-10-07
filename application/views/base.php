<!doctype html>
<html>
<head>
    <title>Qoodles</title>
    <?= link_tag('css/bootstrap.min.css') ?>
    <?= link_tag('css/styles.css') ?>
</head>

<body>
    <div class='navbar xnavbar-fixed-top'>
    <div class='navbar-inner'>
    <div class='container'>

    <a class='brand' href='<?= base_url() ?>'>Qoodles</a>
    <ul class='nav'>

        <li><?= anchor('/search/random', 'Random') ?></li>
        <li><?= anchor('/search/authors', 'Authors') ?></li>
        <li><?= anchor('/search/nats', 'Nationalities') ?></li>
        <li><?= anchor('/search/cats', 'Professions') ?></li>

        <?= form_open('/advanced_search/quotes', "class='navbar-search pull-left'") ?>
            <input name='kw_any' type='text' class='input-medium search-query' placeholder='Quick Search'/>
            <input type='hidden' name='submit' value='submit'/>
        <?= form_close() ?>

        <li><a id='advanced' href='/advanced_search'><div class='nav_adv'>Advanced <br>Search</div></a></li>
        <li><?= anchor('/about', 'About') ?></li>
    </ul>

    </div>
    </div>
    </div>

    <div class='container'>
    <div class='row'>
    <div class='span10 offset1'>

        <?php if (isset($title)): ?>
        <div class='span8 center'>
            <h1 class='title'><?= $title ?></h1>
        </div>
        <?php endif ?>

        <?= $content ?>

    </div>
    </div>
    </div>

</body>
</html>

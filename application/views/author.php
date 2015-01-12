<div class="span8 center">
    <h1><?= $author->name ?></h1>
    <h3><?= "$author->nat $author->cat" ?></h3>
    <div class='dob_dod'>
        <?php if (!empty($dob)): ?>
            <p>Born: <?= $dob ?></p>
        <?php endif ?>
        <?php if (!empty($dod)): ?>
            <p>Died: <?= $dod ?></p>
        <?php endif ?>
    </div>
    <br/>
</div>

<div class="row">
    <div class="span9">
        <?php foreach ($quotes as $quote): ?>
        <blockquote><p> <?= $quote->quote ?></blockquote><p>
        <?php endforeach ?>
    </div>
</div>


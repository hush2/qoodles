<div class="span8 center">
    <h1><?= $author->name ?></h1>
    <h3><?= "$author->nat $author->cat" ?></h3>
    <div class='dob_dod'>
        <? if (!empty($dob)): ?>
            <p>Born: <?= $dob ?></p>
        <? endif ?>
        <? if (!empty($dod)): ?>
            <p>Died: <?= $dod ?></p>
        <? endif ?>        
    </div>
    <br/>
</div>

<div class="row">
    <div class="span8 ">
        <?php foreach ($quotes as $quote): ?>
        <blockquote><p> <?= $quote->quote ?></blockquote><p>
        <?php endforeach ?>
    </div>
</div>


<div class='row'>
<?php foreach ($nationalities as $nats): ?>
    <div class='span2'>
    <?php foreach ($nats as $nat): ?>
        <?= anchor("/search/nat/{$nat->nat}", $nat->nat) ?><br/>
    <?php endforeach ?>
    </div>
<?php endforeach ?>
</div>

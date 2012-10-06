<div class='row'>
    <?php foreach($categories as $cats): ?>
    <div class='span2'>
        <?php foreach($cats as $cat): ?>
        <?= anchor("/search/cat/{$cat->cat}", $cat->cat) ?><br/>
        <?php endforeach ?>
    </div>
    <?php endforeach ?>
</div>

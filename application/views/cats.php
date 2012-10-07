<div class='row'>
    <?php foreach($cats as $categories): ?>
    <div class='span2'>
        <?php foreach($categories as $cat): ?>
        <?= anchor("/search/cat/{$cat->cat}", $cat->cat) ?><br/>
        <?php endforeach ?>
    </div>
    <?php endforeach ?>
</div>

<html>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<?php foreach ($articles as $element): ?>
    <article>
        <h2><?= htmlspecialchars($element['title']) ?></h2>
        <p><?= htmlspecialchars($element['content']) ?></p>
    </article>
<?php endforeach ?>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

</html>



       





<html>

<?php $title = $post; ?>

<?php ob_start(); ?>

<body>
        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h3>Commentaires</h3>

        <?php

        while ($comment = $comments->fetch())
        {
        ?>
            <p><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
    </body>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

</html>
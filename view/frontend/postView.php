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

        <h3>Vos réactions</h3>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
    </body>

<?php $content=ob_get_clean(); ?>

<?php require('template.php') ?>

</html>
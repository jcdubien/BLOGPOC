
<?php

foreach ($comment as $data) {
?>
    <div class="news">
    <h3>
        <?= htmlspecialchars($data['author']) ?>
        <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($data['comment'])) ?>
        <br />
        <em><a href="/BLOG/index.php?action=deletecomment&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
    </p>

</div>   
<?php
}
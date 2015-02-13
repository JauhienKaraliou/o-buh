<?php require 'inc/views/divs/header.php' ?>

    <h1><?= View::lang('Guestbook') ?></h1>

    <ul><?php foreach ($this->comments as $comment) { ?>
            <li>
                <div id="<?= $comment['id_comment'] ?>"><?= $comment['text'] ?></div>
            </li>
        <?php } ?>
    </ul>

<?php
require 'inc/views/divs/paginator.php';
require 'inc/views/forms/form_add_comment.php';
require 'inc/views/divs/footer.php' ?>
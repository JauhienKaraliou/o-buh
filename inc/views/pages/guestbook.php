<?php require 'inc/views/divs/header.php' ?>

    <h3><?= View::lang('Guestbook') ?></h3>

    <dl class="dl-horizontal"><?php foreach ($this->comments as $comment) { ?>
            <dt><?=$comment['author_name']?><br><time><small><?=$comment['date_time'] ?></small></time></dt>
            <dd>
                <div id="<?= $comment['id_comment'] ?>"><?= $comment['text'] ?></div>
            </dd>
        <?php } ?>
    </dl>

<?php
require 'inc/views/divs/paginator.php';
require 'inc/views/forms/form_add_comment.php';
require 'inc/views/divs/footer.php' ?>
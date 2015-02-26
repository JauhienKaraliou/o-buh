<?php require 'inc/views/divs/header.php' ?>

    <h3><?= View::lang('News') ?></h3>
<?php if (isset($userStatus)) { ?>
    <a class="btn btn-default" href="<?= View::generateLink(array('news', 'create')) ?>"><?= View::lang('Create Post') ?></a>
<?php } ?>

    <div>
        <?php foreach ($this->newsList as $post) { ?>
            <div><?= $post['prev_content'] ?><br>
                <a href="<?= View::generateLink(array('news', 'post', $post['id_post'])) ?>"><?= View::lang('Read more') ?></a>
            </div>
            <hr>
        <?php } ?>
    </div>

<?php
require 'inc/views/divs/paginator.php';
require 'inc/views/divs/footer.php' ?>
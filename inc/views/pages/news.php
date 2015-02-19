<?php require 'inc/views/divs/header.php' ?>

    <h1><?= View::lang('News') ?></h1>
<?php if (isset($userStatus)) { ?>
    <a href="<?= View::generateLink(array('news', 'create')) ?>"><?= View::lang('Create Post') ?></a>
<?php } ?>
    <ul>
        <?php foreach ($this->newsList as $post) { ?>
            <li><?= $post['prev_content'] ?></li> <?php } ?>
    </ul>

<?php require 'inc/views/divs/footer.php' ?>
<?php require 'inc/views/divs/header.php' ?>

    <h3><?= $this->post['title'] ?></h3>

    <div class="">
        <?= $this->post['content'] ?>
    </div>

    <time><?= $this->post['date_time'] ?></time>
    <p>
        <a href="<?= View::generateLink(array('news')) ?>"> <?= View::lang('Back to newslist') ?></a>
    </p>


<?php require 'inc/views/divs/footer.php' ?>
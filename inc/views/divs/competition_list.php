<ul>
    <?php foreach ($this->competitions as $competition) { ?>
        <li><?= $competition['name'] ?>
            <?= $competition['date_begin'] ?>
            <?= $competition['date_end'] ?>
            <?= View::lang('Registration link:')?>
            <?= View::generateLink(array('registration','default',$competition['id_contest'])) ?>
        </li>

<?php }?>
</ul>
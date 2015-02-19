<?php require 'inc/views/divs/header.php' ?>

<h1><?= View::lang('Administration/moderating page') ?></h1>

<?php
require_once 'inc/views/forms/form_set_new_competitions.php';
require_once 'inc/views/divs/competition_list.php';
require_once 'inc/views/forms/form_set_new_moderator.php';
/**
 * @todo set list of current administrators and moderators
 */
require_once 'inc/views/divs/footer.php' ?>

<form class="form-horizontal" method="post" enctype="multipart/form-data"
action="<?= View::generateLink(array('admin', 'setModerator')) ?>">
<fieldset>

    <!-- Form Name -->
    <legend><?= View::lang('Register new moderator for the site') ?></legend>

    <!-- Name input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="username"><?= View::lang('Username') ?></label>

        <div class="col-md-3">
            <input id="username" name="new_name" placeholder="<?= View::lang('Pavlik') ?>"
                   class="form-control input-md" required type="text">
        </div>
    </div>

    <!-- E-mail input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="email"><?= View::lang('E-mail') ?></label>

        <div class="col-md-3">
            <input id="email" name="email" placeholder="<?= View::lang('name@gmail.com') ?>"
                   class="form-control input-md" required type="date">
        </div>
    </div>


    <!-- Password input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="password"><?= View::lang('Set password') ?></label>

        <div class="col-md-3">
            <input id="password" name="new_password" placeholder="<?= View::lang('') ?>"
                   class="form-control input-md" required type="date">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="setbutton"></label>

        <div class="col-md-4">
            <button id="setbutton" name="action" value="setModerator"
                    class="btn btn-primary"><?= View::lang('Register') ?></button>
        </div>
    </div>

</fieldset>
</form>
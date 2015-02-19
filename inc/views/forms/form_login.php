<form class="form-horizontal" method="post" enctype="multipart/form-data"
      action="<?= View::generateLink(array('admin', 'login')) ?>">
    <fieldset>

        <!-- Form Name -->
        <legend><?= View::lang('Enter username and password') ?></legend>

        <!-- Name input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="username"><?= View::lang('Your name') ?></label>

            <div class="col-md-3">
                <input id="username" name="username" class="form-control input-md" required type="text">
            </div>
        </div>

        <!-- Surname input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password"><?= View::lang('Password') ?></label>

            <div class="col-md-3">
                <input id="password" name="password" class="form-control input-md" required type="password">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>

            <div class="col-md-4">
                <button id="singlebutton" name="action" value="login"
                        class="btn btn-primary"><?= View::lang('Log In') ?></button>
            </div>
        </div>

    </fieldset>
</form>

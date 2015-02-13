<form class="form-horizontal" method="post" action="<?= View::generateLink(array('guestbook', 'saveMessage')) ?>">
    <fieldset>

        <!-- Form Name -->
        <legend><?= View::lang('Enter your comment') ?></legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>

            <div class="col-md-5">
                <textarea class="form-control" id="comment" name="messagetext"
                          placeholder="<?= View::lang('Comment...') ?>" required></textarea>
            </div>
        </div>

        <!-- name and e-mail input-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>

            <div class="col-md-5">
                <input class="col-md-5" type="text" name="author_name" id="author" placeholder="<?= View::lang('Your
                name') ?>">
                <input class="col-md-7" type="email" name="author_email" id="email"
                       placeholder="<?= View::lang('your email (won\'t be seen)') ?>">
            </div>
        </div>

        <!-- CAPTCHA input-->
        <div class="form-group">
            <label class="col-md-4 control-label"><?= $captchaQuest ?></label>

            <div class="col-md-5">
                <input class="col-md-5" type="text" name="captha" id="author"
                       placeholder="<?= View::lang('Insert answer') ?>">
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>

            <div class="col-md-4">
                <input type="submit" name="action" value="<?= View::lang('Post the comment') ?>"
                       class="btn-md btn-inverse col-md-4">
            </div>
        </div>

    </fieldset>
</form>
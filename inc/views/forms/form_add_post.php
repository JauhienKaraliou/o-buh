<form method="post" action="<?= View::generateLink(array('news', 'publish')) ?>"
      enctype="multipart/form-data"
      class="form-horizontal">

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="post_title"><?= View::lang('Input label') ?></label>

        <div class="col-md-4">
            <input id="post_title" name="post_title" placeholder="<?= View::lang('') ?>" class="form-control input-md"
                   type="text">
            <span class="help-block"></span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="post_preview"><?= View::lang('Input preview') ?></label>

        <div class="col-md-4">
            <input id="post_preview" name="post_preview" placeholder="<?= View::lang('') ?>" class="form-control
            input-md" type="text">
            <span class="help-block"></span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="elm1"></label>

        <div class="col-md-5">
                <textarea class="form-control" id="elm1" name="area"
                          placeholder="<?= View::lang('Type your post here') ?>"></textarea>
        </div>
    </div>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label"></label>

        <div class="col-md-4">
            <button type="submit" name="action" value="publish" class="btn btn-md btn-inverse col-md-4">
                <?= View::lang('Publish') ?></button>
        </div>
    </div>
</form>

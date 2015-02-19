<form class="form-horizontal" method="post" enctype="multipart/form-data"
action="<?= View::generateLink(array('admin', 'setNewCompetition')) ?>">
<fieldset>

    <!-- Form Name -->
    <legend><?= View::lang('Register new competitions') ?></legend>

    <!-- Name input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name"><?= View::lang('Competitions name') ?></label>

        <div class="col-md-6">
            <input id="name" name="name" placeholder="<?= View::lang('Praleska-2015') ?>"
                   class="form-control input-md" required type="text">
        </div>
    </div>

    <!-- Date-begin input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="number_of_days"><?= View::lang('Number of days') ?></label>

        <div class="col-md-2">
            <input id="number_of_days" name="day_num" placeholder="<?= View::lang('3') ?>"
                   class="form-control input-md" required type="date">
        </div>
    </div>


    <!-- Date-begin input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="date_begin"><?= View::lang('Date begin') ?></label>

        <div class="col-md-3">
            <input id="date_begin" name="date_begin" placeholder="<?= View::lang('yyyy-mm-dd') ?>"
                   class="form-control input-md" required type="date">
        </div>
    </div>


    <!-- Date-finish input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="date_finish"><?= View::lang('Date finish') ?></label>

        <div class="col-md-3">
            <input id="date_finish" name="date_finish" placeholder="<?= View::lang('yyyy-mm-ddd') ?>"
                   class="form-control input-md" required type="date">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="registerbutton"></label>

        <div class="col-md-4">
            <button id="registerbutton" name="action" value="setNewCompetition"
                    class="btn btn-primary"><?= View::lang('Register') ?></button>
        </div>
    </div>

</fieldset>
</form>



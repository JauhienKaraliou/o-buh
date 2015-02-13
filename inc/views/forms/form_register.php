<form class="form-horizontal" method="post" enctype="multipart/form-data"
      action="<?= View::generateLink(array('registration', 'submit')) ?>">
    <fieldset>

        <!-- Form Name -->
        <legend><?= View::lang('Register for this competitions') ?></legend>

        <!-- Name input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name"><?= View::lang('Your name') ?></label>

            <div class="col-md-6">
                <input id="name" name="name" placeholder="<?= View::lang('Vasia') ?>"
                       class="form-control input-md" required type="text">
            </div>
        </div>

        <!-- Surname input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="surname"><?= View::lang('Surname') ?></label>

            <div class="col-md-6">
                <input id="surname" name="surname" placeholder="<?= View::lang('Stralcou') ?>"
                       class="form-control input-md" required type="text">
            </div>
        </div>

        <!-- Select Gender -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="gender0"><?= View::lang('Gender') ?></label>

            <div class="col-md-4">
                <select id="gender" name="gender" class="form-control">
                    <option value="male"><?= View::lang('Male') ?></option>
                    <option value="female"><?= View::lang('Female') ?></option>
                </select>
            </div>
        </div>

        <!-- Select Birth year -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="year_of_birth"><?= View::lang('Year of birth') ?></label>

            <div class="col-md-4">
                <select id="year_of_birth" name="year_of_birth" class="form-control">
                    <?php for ($i = 1900; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option><?php } ?>
                </select>
            </div>
        </div>

        <!-- Select Club -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="club"><?= View::lang('Club...') ?></label>

            <div class="col-md-4">
                <select id="club" name="club_id" class="form-control">
                    <option value=""><?= View::lang('New') ?></option>
                    <?php foreach ($this->clubs as $club) { ?>
                        <option value="<?= $club['id_club'] ?>"><?= $club['club_name'] ?></option><?php } ?>
                </select>
            </div>
        </div>

        <!-- New Club input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="new_club"><?= View::lang('...or add your club') ?></label>

            <div class="col-md-4">
                <input id="new_club" name="new_club" placeholder="<?= View::lang('Baklan') ?>"
                       class="form-control input-md" type="text">
                <span class="help-block"><?= View::lang('set new club to selection') ?></span>
            </div>
        </div>

        <!-- Select Qualification -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="qualification"><?= View::lang('Qualification') ?></label>

            <div class="col-md-4">
                <select id="qualification" name="qualification" class="form-control">
                    <?php foreach ($this->quals as $qual) { ?>
                        <option value="<?= $qual['id_qual'] ?>"><?= $qual['qual_name'] ?></option><?php } ?>
                </select>
            </div>
        </div>

        <!-- Select Class -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="class"><?= View::lang('Class') ?></label>

            <div class="col-md-4">
                <select id="class" name="class" class="form-control">
                    <?php foreach ($this->classes as $class) { ?>
                        <option value="<?= $class['id_class'] ?>"><?= $class['class_name'] ?></option><?php } ?>
                </select>
            </div>
        </div>

        <!-- SI-card number input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="si_card"><?= View::lang('SI-card number') ?></label>

            <div class="col-md-4">
                <input id="si_card" name="si_card" placeholder="<?= View::lang('2000531') ?>"
                       class="form-control input-md" type="text">
                <span class="help-block"><?= View::lang('leave empty if to use provided by organizers') ?></span>
            </div>
        </div>

        <!-- Participating days checkboxes -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes">
                <?= View::lang('Select participating dates') ?></label>
            <div class="col-md-4">
                <?php foreach($this->partEtaps as $etap) { $i=1; ?>
                <label class="checkbox-inline" for="<?= $etap['etap_id'] ?>">
                    <input name="etap_id[]" id="<?= $etap['etap_id'] ?>" value="<?= $etap['etap_id'] ?>"
                           type="checkbox">
                    <?= $i ?>
                </label> <?php $i++; }?>
            </div>
        </div>

        <!-- Club agent email input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="club_agent_email"><?= View::lang('Club agent e-mail') ?></label>

            <div class="col-md-6">
                <input id="club_agent_email" name="club_agent_email" placeholder="stralcou@vasia.me"
                       class="form-control input-md" required type="text">
                <span class="help-block"><?= View::lang('all changes will be done using this adress') ?></span>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"><?= View::lang('Single Button') ?></label>

            <div class="col-md-4">
                <button id="singlebutton" name="action" value="register"
                        class="btn btn-primary"><?= View::lang('Button') ?></button>
            </div>
        </div>

    </fieldset>
</form>

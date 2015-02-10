<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=BASE_URL?>registration/submit">
    <fieldset>

        <!-- Form Name -->
        <legend>Register on this competitions</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Your name</label>
            <div class="col-md-6">
                <input id="name" name="name" placeholder="Vasia" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="surname">Surname</label>
            <div class="col-md-6">
                <input id="surname" name="surname" placeholder="Stralcou" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="year_of_birth">Year of birth</label>
            <div class="col-md-4">
                <select id="year_of_birth" name="year_of_birth" class="form-control">
                    <?php for($i=1900;$i<=date("Y");$i++){ ?><option value="<?=$i?>"><?=$i?></option><?php } ?>
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="club">Club...</label>
            <div class="col-md-4">
                <select id="club" name="club" class="form-control">
                    <option value="">new</option>
                    <?php foreach($this->clubs as $club){ ?>
                    <option value="<?=$club['id']?>"><?=$club['club_name']?></option>
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="new_club">...or add your club</label>
            <div class="col-md-4">
                <input id="new_club" name="new_club" placeholder="Baklan" class="form-control input-md" type="text">
                <span class="help-block">set new club to selection</span>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="qualification">Qualification</label>
            <div class="col-md-4">
                <select id="qualification" name="qualification" class="form-control">
                    <option value="1">MS</option>
                    <option value="2">KMS</option>
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="class">Class</label>
            <div class="col-md-4">
                <select id="class" name="class" class="form-control">
                    <option value="1">M21E</option>
                    <option value="2">W21E</option>
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="si_card">SI-card number</label>
            <div class="col-md-4">
                <input id="si_card" name="si_card" placeholder="2000531" class="form-control input-md" type="text">
                <span class="help-block">leave empty if to use provided by organizers</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="club_agent_email">Club agent e-mail</label>
            <div class="col-md-6">
                <input id="club_agent_email" name="club_agent_email" placeholder="stralcou@vasia.me" class="form-control input-md" required="" type="text">
                <span class="help-block">all changes will be done using this adress</span>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
            </div>
        </div>

    </fieldset>
</form>

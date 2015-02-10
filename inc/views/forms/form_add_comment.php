<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>Enter your comment</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-5">
                <textarea class="form-control" id="comment" name="messagetext"
                          placeholder="comment..." required></textarea>
            </div>
        </div>

        <!-- name and e-mail input-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-5">
                <input class="col-md-5" type="text" name="author" id="author" placeholder="your name">
                <input class="col-md-7" type="email" name="email" id="email" placeholder="your email (won't be seen)">
            </div>
        </div>

        <!-- CAPTCHA input-->
        <div class="form-group">
            <label class="col-md-4 control-label">2+2</label>
            <div class="col-md-5">
                <input class="col-md-5" type="text" name="author" id="author" placeholder="enter answer">
            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="submit" name="action" value="Post the comment" class="btn-md btn-inverse col-md-4">
            </div>
        </div>

    </fieldset>
</form>
<div class="well">
        <?php if($errors->any()) : ?>
        <div class="alert alert-error">
        <h4>Opps!</h4>
                Wrong Username password combination...
        </div>
        <? else : ?>
        <div class="alert alert-info">
        <h4>Welcome!</h4>
                Please type in your credentials...
        </div>
        <?php endif; ?>
        <form class="form-horizontal" action='' method="POST">
                <fieldset>
                        <div id="legend">
                                <legend class="">Login</legend>
                        </div>    
                        <div class="control-group">
                                <!-- Username -->
                                <label class="control-label"  for="username">Username</label>
                                <div class="controls">
                                        <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge" autofocus="true" value="<?php echo Input::old('username') ?>">
                                </div>
                        </div>

                        <div class="control-group">
                                <!-- Password-->
                                <label class="control-label" for="password">Password</label>
                                <div class="controls">
                                        <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
                                </div>
                        </div>

                        <div class="control-group">
                                <!-- Button -->
                                <div class="controls">
                                        <button class="btn btn-success">Login</button>
                                </div>
                        </div>
                </fieldset>
        </form>
</div>
<script type="text/javascript">
    $(function () {$('[autofocus]').first().focus()});
</script>
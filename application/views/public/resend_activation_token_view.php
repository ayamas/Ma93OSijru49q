<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-info">
                <?php if (!empty($message)) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <div class="panel-heading">
                    <h3 class="panel-title">Resend Activation Token</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open(current_url()); ?>
                    <fieldset>
                        <div class="form-group">
                            <input type="text" id="identity" name="activation_token_identity" value="" class="form-control" placeholder="Username" autofocus/>
                        </div>

                        <input type="submit" name="send_activation_token" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block"/>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div style="text-align: right;">
                Don't need to reactivate? <a href="<?php echo base_url() ?>">Log In</a><br>
            </div>
        </div>
    </div>
</div>

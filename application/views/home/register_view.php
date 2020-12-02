<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div id="register_form_error" class="alert alert-danger">

            </div>

            <form id="register_form" action="<?php echo site_url('api/register'); ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="control-label">Confirm Password</label>
                    <div class="controls">
                        <input type="password" name="confirm_password" class="form-control">
                    </div>
                </div>

                <input type="submit" name="submit" value="Register" class="btn btn-primary">
            </form>
            <a href="<?php echo site_url('/') ?>">Back</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#register_form_error').hide();

        $('#register_form').submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function (o) {
                if(o.result == 1){
                    window.location.href = "<?php echo site_url('dashboard'); ?>";
                }else {
                    $('#register_form_error').show();
                    var output = '<ul>';
                    for(var key in o.error){
                        var value = o.error[key];
                        output += "<li>" + value + "</li>"
                    }
                    output += '</ul>';
                    $('#register_form_error').html(output);
                }
            }, 'json')
        })
    });
</script>
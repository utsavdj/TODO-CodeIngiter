<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <form id="login_form" action="<?php echo site_url('api/login'); ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="username" class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <div class="controls">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
            <a href="<?php echo site_url('home/register') ?>">Register</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#login_form').submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url, postData, function (o) {
                if(o.result == 1){
                    window.location.href = "<?php echo site_url('dashboard'); ?>";
                }else {
                    alert('Invalid Login');
                }
            }, 'json')
        })
    });
</script>
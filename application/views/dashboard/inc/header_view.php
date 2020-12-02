<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ciDash/dashboard/result.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ciDash/dashboard/event.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ciDash/dashboard/template.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ciDash/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <script>
        var dashboard = new Dashboard();
    </script>
</head>
<body>

<header>
    Welcome!
</header>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url('home') ?>">CI App</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="">Dashboard</a></li>
            <li><a href="">User</a></li>
            <li><a href="<?php echo site_url('dashboard/logout') ?>">Logout</a></li>
        </ul>
    </div>
</nav>


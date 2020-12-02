<div class="container">
    <div class="row">
        <div id="error" class="alert alert-danger hide-a">

        </div>

        <div id="success" class="alert alert-success hide-a">

        </div>

        <div id="dashboard-side" class="col-xs-4">
            <form id="create_todo" method="post" action="<?php echo site_url('api/create_todo'); ?>">
                <input type="text" name="content" placeholder="Create New ToDo Item">
                <input type="submit" value="Create">
            </form>
            <div id="list_todo">

            </div>
        </div>

        <div id="dashboard-main" class="col-xs-8">

        </div>
    </div>
</div>

Dashboard

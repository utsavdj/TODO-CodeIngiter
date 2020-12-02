var Event = function () {

    // -----------------------------------------------------------------------------------------------------------------
    this.__construct= function () {
        console.log("Event Created");
        Result = new Result();
        create_todo();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();
    };

    // -----------------------------------------------------------------------------------------------------------------

    var create_todo = function () {
        $(function () {
            $('#create_todo').submit(function (evt) {
                evt.preventDefault();
                var url = $(this).attr('action');
                var postData = $(this).serialize();

                $.post(url, postData, function (o) {
                    if (o.result == 1) {
                        Result.success();
                        var output = Template.todo(o.data[0]);
                        $('#list_todo').append(output);
                    } else {
                        Result.error(o.error);
                    }
                }, 'json');
            })
        });
    };

    // -----------------------------------------------------------------------------------------------------------------

    var create_note = function () {
        $(function () {
            $('#create_note').submit(function (evt) {
                return false;
            })
        });
    };

    // -----------------------------------------------------------------------------------------------------------------

    var update_todo = function () {

    };

    // -----------------------------------------------------------------------------------------------------------------

    var update_note = function () {

    };

    // -----------------------------------------------------------------------------------------------------------------

    var delete_todo = function () {
        $(function () {
            $("div").on("click", ".todo_delete", function (e) {
                e.preventDefault();
                var self = $(this).parent('div');
                var url = $(this).attr('href');
                var postData = {
                    'todo_id': $(this).attr('data-id')
                };
                $.post(url, postData, function (o) {
                    if (o.result == 1) {
                        Result.success('Item Deleted.');
                        self.remove();
                    } else {
                        Result.error(o.msg);
                    }
                }, 'json');
            });
        });
    };

    // -----------------------------------------------------------------------------------------------------------------

    var delete_note = function () {

    };

    // -----------------------------------------------------------------------------------------------------------------

    this.__construct();

    // -----------------------------------------------------------------------------------------------------------------

};
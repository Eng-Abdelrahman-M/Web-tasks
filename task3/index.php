<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test3</title>


    <link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/footable/css/footable.bootstrap.min.css">
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body>
    <div class="container body-content  py-2">
        <form>
            <div class="row">
                <div class="col">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" placeholder="Name" class="form-control" id="username">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="passtext" placeholder="Password"
                                id="password">
                        </div>
                    </div>
                </div>

                <div class="col">

                    <fieldset class="form-group">
                        <input type="file" class="form-control-file" id="inputFile">
                    </fieldset>
                    <button type="button" class="btn waves-effect waves-light btn-primary" id="import">Import</button>

                </div>


            </div>
        </form>
        <?php include 'mytable.php';?>
        <div class="row">
            <button type="button" class="btn waves-effect waves-light btn-danger" value="reset" id="drop">Reset
                All</button>
        </div>
    </div>

</body>

<footer>
    <script src="libs/jquery/dist/jquery.min.js "></script>
    <script src="libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <script src="libs/moment/moment.js" type="text/javascript"></script>
    <script type="text/javascript" src="libs/footable/js/footable.min.js"></script>
    <script src="js/custom.min.js "></script>
    <Script>
    $(function() {
        var myfootable = FooTable.init('#footable-3', {
            "columns": [{
                    "name": "clientDeal_id",
                    "title": "ClientDeal ID",
                },
                {
                    "name": "client_id",
                    "title": "Client ID"
                },
                {
                    "name": "client_name",
                    "title": "Client Name"
                },
                {
                    "name": "deal_id",
                    "title": "Deal Id"
                },
                {
                    "name": "deal_name",
                    "title": "Deal Name"
                },
                {
                    "name": "date",
                    "title": "Date"
                },
                {
                    "name": "accepted",
                    "title": "Accepted"
                },
                {
                    "name": "refused",
                    "title": "Refused"
                }
            ]
        });
        $('#import').click(function() {

            var fileType = '.csv';
            var username = $('#username').val();
            var password = $('#password').val();
            if (typeof password === "undefined") {
                password = "";
            }
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
            if (!regex.test($("#inputFile").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
                $("#response").html("Invalid File. Upload : <b>" + fileType +
                    "</b> Files.");
                beark;
            }
            var fd = new FormData();
            fd.append('file', $('#inputFile').prop('files')[0]); // since this is your file input
            fd.append('username', username);
            fd.append('password', password);
            $.ajax({
                url: 'import.php',
                type: "post",
                dataType: 'html',
                processData: false, // important
                contentType: false, // important
                data: fd,
                success: function(text) {
                    alert(JSON.stringify(text));
                },
                error: function(text) {
                    alert("error" + text.responseText);
                },
                complete: function(text) {
                    $.ajax({
                        type: "post",
                        url: "display.php",
                        dataType: 'json',
                        data: {
                            'username': username,
                            'password': password
                        },
                        success: function(response) {
                            var len = response.length;
                            alert(len);
                            var rows = [];
                            for (var i = 0; i < len; i++) {
                                var clientDeal_id = response[i].clientDeal_id;
                                var client_id = response[i].client_id;
                                var client_name = response[i].client_name;
                                var deal_id = response[i].deal_id;
                                var deal_name = response[i].deal_name;
                                var date = response[i].date;
                                var accepted = response[i].accepted;
                                var refused = response[i].refused;

                                var row = [{
                                    "clientDeal_id": clientDeal_id,
                                    "client_id": client_id,
                                    "client_name": client_name,
                                    "deal_id": deal_id,
                                    "deal_name": deal_name,
                                    "date": date,
                                    "accepted": accepted,
                                    "refused": refused
                                }]
                                rows.push(row[0]);
                            }
                            myfootable.rows.load(rows);
                        },
                        error: function(response) {
                            alert("e " + JSON.stringify(response));
                        }
                    });
                }
            });

        });

        $('#drop').click(function() {
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                url: 'drop.php',
                type: "post",
                dataType: 'html',
                data: {
                    'username': username,
                    'password': password
                },
                success: function(text) {
                    alert("drop success");
                },
                error: function(text) {
                    alert("drop error");
                }
            });
        });
    });
    </script>
</footer>

</html>
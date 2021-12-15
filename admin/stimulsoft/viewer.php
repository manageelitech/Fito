<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viewer</title>

    <!-- Report Office2013 style -->
    <link href="stimulsoft/css/stimulsoft.viewer.office2003.css" rel="stylesheet">
    <link href="stimulsoft/css/stimulsoft.designer.office2013.lightgraygreen.css" rel="stylesheet">


    <!-- Stimusloft Reports.JS -->
    <script src="stimulsoft/scripts/stimulsoft.reports.js" type="text/javascript"></script>
    <script src="stimulsoft/scripts/stimulsoft.reports.maps.js" type="text/javascript"></script>
    <script src="stimulsoft/scripts/stimulsoft.viewer.js" type="text/javascript"></script>
    <script src="stimulsoft/scripts/stimulsoft.designer.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <?php
    require_once 'stimulsoft/helper.php';

    $options = StiHelper::createOptions();
    $options->handler = "stimulsoft/handler.php";
    $options->timeout = 30;
    StiHelper::initialize($options);
    ?>

    <script>
    Stimulsoft.Base.StiLicense.loadFromFile("stimulsoft/license.key");

    var options = new Stimulsoft.Viewer.StiViewerOptions();
    options.appearance.fullScreenMode = true;
    options.toolbar.showSendEmailButton = true;

    var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);

    // Process SQL data source
    viewer.onBeginProcessData = function(event, callback) {
        <?php StiHelper::createHandler(); ?>
    };

    // Manage export settings on the server side
    viewer.onBeginExportReport = function(args) {
        <?php //StiHelper::createHandler(); ?>
        //args.fileName = "MyReportName";
    };



    // Send exported report to Email
    viewer.onEmailReport = function(event) {
        <?php StiHelper::createHandler(); ?>
    };

    // Load and show report
    var report = new Stimulsoft.Report.StiReport();

    <?php

        /*for checking if edited ver is available*/
        if(is_dir("stimulsoft/customReports")) {

            $status=true;
        }
        else {
            mkdir("stimulsoft/customReports");
            $status=true;
        }

        ?>

    var status = "<?php echo($status);?>";
    // var selId = localStorage.getItem('orderNo');
    var selId = GetURLParameter('order');

    $.ajax({
        method: "POST",
        url: 'getDistBillDetails.php',
        data: {
            selId: selId
        },
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        dataType: "json",


        success: function(data) {

            // console.log(data);
            var arr = [];
            arr.push(data)
            if (status) {
                var fileName = 'dist.mrt';
                //var fileExits;

                $.ajax({
                    url: 'stimulsoft/customReports/' + fileName,
                    type: 'HEAD',
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 404) {
                            report.loadFile('stimulsoft/reports/dist.mrt');
                            viewer.report = report;
                        }

                    },
                    success: function() {
                        report.loadFile("stimulsoft/customReports/dist.mrt");
                        viewer.report = report;
                    }
                });
            }

            var dataSet = new Stimulsoft.System.Data.DataSet("NewDataSet");

            var myarr = {
                UtResult: arr
            };
            // console.log(myarr);
            var mydata = JSON.stringify(data);


            dataSet.readJson(mydata);
            // Remove all connections from the report template
            report.dictionary.databases.clear();
            report.regData("NewDataSet", "NewDataSet", dataSet);
            report.render();

        },
        error: function(fail) {
            console.log("fail");
        },
    });
    //get url parameter This is not a part of stimulsoft
    function GetURLParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }

    function onLoad() {
        viewer.renderHtml("viewerContent");
    }
    </script>

</head>

<body onload="onLoad();">
    <div id="viewerContent"></div>



</body>

</html>
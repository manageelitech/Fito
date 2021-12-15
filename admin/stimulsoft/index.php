<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Stimulsoft</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



</head>
<body>

<div class="row">
    <div class="col-lg-2">
        <select class="form-control" id="dummyId" onchange="">
            <option value="">Select one</option>
        </select>
    </div>

    <div class="col-lg-2">
        <button type="button" class="btn btn-primary btn-xs" onclick="loadMrt()">View</button>
    </div>

    <div class="col-lg-2">
        <button type="button" class="btn btn-primary btn-xs" onclick="loadDesignMrt()">Designer</button>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>




<script>
    $( document ).ready(function() {
        getDet();
    });
</script>

<script>
    function getDet() {

        $('#dummyId').empty();
        $.ajax({
            method: "POST",
            url: "process/getOrderIds.php",
            data: {  },
            xhrFields: {
                withCredentials: true
            },
            crossDomain: true,
            dataType: "json",

            success: function (data) {

                //console.log(data);

                for(var a=0;a<data.length;a++){
                    $('#dummyId')
                        .append($('<option></option>').val(data[a].slno).text(data[a].orderNo));
                }


            },
            error: function (fail) {
                console.log("fail");
            },
        });
    }
</script>

<script>
    function loadMrt() {

        localStorage.setItem('orderNo',$('#dummyId').val());

        window.open('viewer.php','_blank');
    }
</script>

<script>
    function loadDesignMrt() {

        localStorage.setItem('orderNo',$('#dummyId').val());

        window.open('designer.php','_blank');
    }
</script>

</body>
</html>
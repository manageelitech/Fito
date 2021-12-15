var type_otp = 'otp';
var type_enquiry = 'enquiry';
$(document).ready(function () {

    $(".btn-enter").click(function () {
        if (enquiryFormValid(false)) {
            //alert('Valid');
            sendEnquiry(type_enquiry);
        }
        else {
            //alert('No');
        }
    });

    $(".btn-send-otp").click(function () {

        //alert('Valid');
        if (enquiryFormValid(true)) {
            //alert('Valid');
            sendEnquiry(type_otp);
        }
        else {
            //alert('No');
        }
    });

    $(".btn-new-enquiry").click(function () {

        clearEnquiryConfirmation();
        clearEnquiryForm();

        $("#enquiry_form").show();
        $("#enquiry_sent").hide();

    });

    $("#OTP").bind("change paste keyup", function () {
        //alert($(this).val());
        if ($(this).val() == "") {
            $('.btn-send-otp').removeAttr("disabled");
            $('.btn-enter').attr("disabled", "disabled");
            $('#Email').attr("disabled", "disabled");
            $('#City').attr("disabled", "disabled");
            $('#Topic').attr("disabled", "disabled");
            $('#Message').attr("disabled", "disabled");
        }
        else {
            $('.btn-send-otp').attr("disabled", "disabled");
            $('.btn-enter').removeAttr("disabled");
            $('#Email').removeAttr("disabled");
            $('#City').removeAttr("disabled");
            $('#Topic').removeAttr("disabled");
            $('#Message').removeAttr("disabled");
        }
        $("#otp_sent_msg").hide();
        $("#otp_failed_msg").hide();
    });

    clearEnquiryForm();
    clearEnquiryConfirmation();

    $("[for=Topic]").html('Topic <span class="red-star">*</span>')
});

function sendEnquiry(_type) {
    jQuery('#overlay').fadeIn();
    if (_type == type_otp) {

    }
    if (_type == type_enquiry) {

    }
    var register_id = $("#register_id");
    var app_id = $("#app_id");

    var full_name = $("#FullName");
    var phone = $("#PhoneNumber");
    var otp = $("#OTP");
    var email = $("#Email");
    var city = $("#City");
    var topic = $("#Topic");
    var message = $("#Message");


    //alert(phone.val());

    //'{register_id: "' + register_id.val() + '", mobile: "' + phone.val() + '", otp: "' + otp.val() + '", app_id: "' + app_id.val() + '", full_name: "' + full_name.val() + '", email: "' + email.val() + '", message: "' + message.val() + '" }',
    var myKeyVals = { register_id: register_id.val(), mobile: phone.val(), otp: otp.val(), app_id: app_id.val(), full_name: full_name.val(), email: email.val(), city: city.val(), topic: topic.val(), message: message.val() };
    $.ajax({
        type: "POST",
        url: "/OTP.aspx",
        data: myKeyVals,
        dataType: "text",
        success: function (data) {

            //var str = JSON.stringify(data);

            var obj = JSON.parse(data);

            //alert(str);
            //alert(obj.status + " = " + _type);
            if (_type == type_otp) {
                if (obj.status == "ok") {
                    $("#otp_sent_msg").show();
                    $('#OTP').removeAttr("disabled");
                }
            }
            if (_type == type_enquiry) {
                if (obj.status == "ok") {
                    $("#TicketNo_Con").html(obj.ticket_no);
                    $("#FullName_Con").html(full_name.val());
                    $("#PhoneNumber_Con").html(phone.val());
                    if (email.val() != '')
                    {
                        $("#Email_Master").show();
                        $("#Email_Con").html(email.val());                        
                    }
                    else
                    {
                        $("#Email_Master").hide();
                        $("#Email_Con").html('');
                    }
                    $("#City_Con").html(city.val());
                    $("#Topic_Con").html(topic.val());
                    $("#Message_Con").html(message.val());

                    clearEnquiryForm();

                    $("#enquiry_form").hide();
                    $("#enquiry_sent").show();
                }
                else {
                    if (obj.type == "otp") {
                        $("#otp_failed_msg").show();
                    }
                }

            }
            jQuery('#overlay').fadeOut();
        },
        failure: function (response) {
            var r = jQuery.parseJSON(response.responseText);
            alert("Message: " + r.Message);
            alert("StackTrace: " + r.StackTrace);
            alert("ExceptionType: " + r.ExceptionType);
        }
    });
    //alert(1);
}

function clearEnquiryForm() {
    $("#FullName").val('');
    $("#PhoneNumber").val('');
    $("#OTP").val('');
    $("#Email").val('');
    $("#City").val('');
    $("#Topic").val('');
    $("#Message").val('');

    $('.btn-send-otp').removeAttr("disabled");
    $('.btn-enter').attr("disabled", "disabled");
    $('#OTP').attr("disabled", "disabled");
    $('#Email').attr("disabled", "disabled");
    $('#City').attr("disabled", "disabled");
    $('#Topic').attr("disabled", "disabled");
    $('#Message').attr("disabled", "disabled");
}

function clearEnquiryConfirmation() {
    $("#TicketNo_Con").html('');
    $("#FullName_Con").html('');
    $("#PhoneNumber_Con").html('');
    $("#Email_Con").html('');
    $("#City_Con").html('');
    $("#Topic_Con").html('');
    $("#Message_Con").html('');
}

function enquiryFormValid(isOtpForm) {
    //var isValid = false;

    var full_name = $("#FullName");
    var phone = $("#PhoneNumber");
    var otp = $("#OTP");
    var email = $("#Email");
    var city = $("#City");
    var topic = $("#Topic");
    var message = $("#Message");

    //alert(email.val());
    //alert(topic.val());

    var full_name_err = $("#Err_FullName");
    var phone_err = $("#Err_PhoneNumber");
    var otp_err = $("#Err_OTP");
    var email_err = $("#Err_Email");
    var city_err = $("#Err_City");
    var topic_err = $("span[data-valmsg-for='Topic']");//$("#Err_Topic");
    var message_err = $("#Err_Message");

    var is_full_name = false;
    var is_phone = false;

    //Fullname
    if (full_name.val() == '') {
        full_name_err.html('Enter Full Name');
        is_full_name = false;
    }
    else {
        full_name_err.html('');
        is_full_name = true;
    }
    //alert(validatePhone(phone.val()));
    //Mobile
    if (phone.val() == '')
    {
        phone_err.html('Enter Mobile Number');
        is_phone = false;
    }
    else
    {

        if (!validatePhone(phone.val())) {
            phone_err.html('Enter Valid Mobile Number');
            is_phone = false;
        }
        else {
            if (phone.val().length < 10 || phone.val().length > 10) {
                phone_err.html('Enter 10 Digit Mobile Number');
                is_phone = false;
            }
            else {
                phone_err.html('');
                is_phone = true;
            }
        }
    }
    //alert(isValidEmailAddress('ab.com'));
    if (isOtpForm)
    {
        if (is_full_name && is_phone)
        {
            return true;
        }
        return false;
    }

    var is_otp = false;
    var is_email = false;
    var is_city = false;
    var is_topic = false;
    var is_message = false;

    //OTP
    if (otp.val() == '') {
        otp_err.html('Enter OTP');
        is_otp = false;
    }
    else
    {
        if (!validatePhone(otp.val())) {
            otp_err.html('Enter Valid OTP');
            is_otp = false;
        }
        else {
            if (otp.val().length < 6 || otp.val().length > 6) {
                otp_err.html('Enter 6 Digit OTP');
                is_otp = false;
            }
            else {
                otp_err.html('');
                is_otp = true;
            }
        }
    }

    //Email
    if (email.val() != '')
    {
        if (!isValidEmailAddress(email.val()))
        {
            email_err.html('Enter Valid Email');
            is_email = false;
        }
        else
        {
            email_err.html('');
            is_email = true;
        }
    }
    else
    {
        is_email = true;
    }
    

    //City
    if (city.val() == '') {
        city_err.html('Enter City');
        is_city = false;
    }
    else {
        city_err.html('');
        is_city = true;
    }
    
    //Topic
    if (topic.val() == '') {
        topic_err.html('Enter Topic');
        is_topic = false;
    }
    else {
        topic_err.html('');
        is_topic = true;
    }

    //Message
    if (message.val() == '') {
        message_err.html('Enter Message');
        is_message = false;
    }
    else {
        message_err.html('');
        is_message = true;
    }

    if (is_full_name &&
        is_phone &&
        is_otp &&
        is_email &&
        is_city &&
        is_topic &&
        is_message) {
        return true;
    }
    return false;
}

function validatePhone(txtPhone) {
    //var filter = /^[0-9-+]+$/;
    var filter = /^[0-9]+$/;
    //var filter = /^[0-9]/;
    if (filter.test(txtPhone)) {
        return true;
    }
    else {
        return false;
    }
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
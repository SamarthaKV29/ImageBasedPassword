var passarr = [];
var formFunction = "log";
$(document).ready(() => {
    $("#loadingmodal").modal("show");
    $("#loggedInDialog").hide();
    $("#sup2").hide();
    $("#frepassholder, #fnameholder").hide();

    if (sessionStorage.getItem("loggedIn")) {
        $("#loginForm").hide();
        $("#loggedInDialog").show();
        $("#loadingmodal").modal("hide");
    }
    else {
        $(".pimgs").click(pimgsHandle);

        setTimeout(() => {
            $("#loadingmodal").modal("hide");
            $("#pimgsholder").fadeIn("slow");
        }, 500);
    }

    $("#lgnform").submit(submitForm);

    $("#logoutbtn").click(logout);

    $("#register").click(regPrep);
});


loginPrep = (e) => {
    formFunction = "log";
    $("#regForm").remove();
    $("#register").text("New User").click(regPrep);
    $("#frepassholder, #fnameholder").hide();
    $("#frepass").attr("required", false);
    $("#loginForm").show();
};

regPrep = (e) => {
    $(e.target).text("Login").click(loginPrep);
    $("#frepassholder, #fnameholder").show();
    formFunction = "reg";
    e.preventDefault();
    if (!$("#regForm").length) {
        regForm = $("#loginForm").clone(withDataAndEvents = true);
        regForm.attr("id", "regForm").children(".card-body").children("form").each((idx, ele) => {
            $(ele).attr("id", "regform");
        });
        regForm.children('.card-header').children().each((idx, ele) => {
            if ($(ele).prop('tagName').toLowerCase() == "span") {
                $(ele).text("Register");
            }
            else if ($(ele).prop('tagName').toLowerCase() == "i") {
                $(ele).removeClass("fa-user").addClass("fa-users");
            }
        });

        regForm.children('.card-body').addClass("bg-grad-blue");
        regForm.appendTo('#userpanel');
    }
    else {
        $("#regForm").show();
    }
    $("#loginForm").hide();
    $("#frepass, #fname").attr("required", true);
};







pimgsHandle = (e) => {
    let currForm = "";
    if (formFunction == "log") {
        currForm = "#lgnform";
    }
    else {
        currForm = "#regform";
    }
    var r = $(e.target).attr("id").substr(3, 3);
    if (passarr.length < 5) {
        $(e.target).toggleClass('selected');

        if (!passarr.includes(r))
            passarr.push(r);
        else {
            passarr = passarr.filter(x => x !== r);
        }
        //console.log(passarr.join("."));
    }
    else {
        $(e.target).removeClass('selected');
        passarr = passarr.filter(x => x !== r);
    }
    if (passarr.length == 5) {
        $(currForm + " #ibp_sup1").addClass("bg-success").removeClass("bg-warning").html("Great job!");
        $(currForm + " #imgpwd").val(passarr.join("."));
    }
    else {
        $(currForm + " #ibp_sup1").addClass("bg-warning").removeClass("bg-success").html("Please select 5 images");
        $(currForm + " #imgpwd").val("");
    }
};

showUName = () => {
    if (sessionStorage.getItem("loggedIn")) {
        let userDet = JSON.parse(sessionStorage.getItem("userDet"));
        $(".userFullName").text(userDet.name);
    }
};
login = (userDet) => {
    sessionStorage.setItem("loggedIn", true);
    sessionStorage.setItem("userDet", userDet);
    $("#loginForm").hide();
    $("#loggedInDialog").show();
    showUName();
}
logout = () => {
    sessionStorage.removeItem("loggedIn", false);
    sessionStorage.removeItem("userDet");
    $("#loginForm").show();
    $("#loggedInDialog").hide();
    $("#pimgsholder").fadeIn();
}
submitForm = (e) => {
    if (formFunction == "log") {
        currForm = "#lgnform";
    }
    else {
        currForm = "#regform";
    }
    e.preventDefault();
    if (formFunction == 'log') {
        if (validateForm($(e.target))) {
            $(currForm + " #sup2," + currForm + " #ibp_sup1 ").hide();
            $.ajax({
                url: "login.php",
                method: "POST",
                data: {
                    'useremail': $(currForm + " #femailID").val(),
                    'password': $(currForm + " #fpassw").val(),
                    'imgpwd': $(currForm + " #imgpwd").val()
                },
                success: (res) => {
                    let errcode = RegExp(/[E][0-9]{3}/);
                    if (!errcode.test(res.loginStatus))
                        login(JSON.stringify({ 'name': res.loginStatus }));
                    else {
                        logout();
                        $(currForm + " #sup2").show();
                        $(currForm + " #sup2").text("Login Failed, please check again!");
                    }

                },
                error: (j, s, err) => {
                    console.log("Failed " + s);
                }
            });

        }
        else {
            $(currForm + " #sup2").html("Please check the errors!").show();
        }
    }
    else {
        if (validateForm('reg', $(e.target))) {
            $(currForm + " #sup2," + currForm + " #ibp_sup1 ").hide();
            $.ajax({
                url: "register.php",
                method: "POST",
                data: {
                    'name': $(currForm + " #fname").val(),
                    'useremail': $(currForm + " #femailID").val(),
                    'password': $(currForm + " #fpassw").val(),
                    'imgpwd': $(currForm + " #imgpwd").val()
                },
                success: (res) => {
                    let errcode = RegExp(/[E][0-9]{3}/);
                    if (!errcode.test(res.regStatus)) {
                        $(currForm + " #sup2").addClass("bg-success").removeClass("bg-danger").text("Registered Successfully!");
                        $(currForm + " #sup2").show();
                    }
                    else {
                        $(currForm + " #sup2").removeClass("bg-success").addClass("bg-danger").text("Registration unsuccessful, please check again!");
                        $(currForm + " #sup2").show();
                    }

                },
                error: (j, s, err) => {
                    console.log("Failed " + j + s + err);
                }
            });
        }
        else {
            $(currForm + " #sup2").html("Please check the errors!").show();
            console.log("Fail");
        }
    }

};


validateForm = (typ = "log", form) => {
    if (formFunction == "log") {
        formID = "#lgnform";
    }
    else {
        formID = "#regform";
    }
    let fname = $(formID + " #fname").val();
    let feid = $(formID + " #femailID").val();
    let fpass = $(formID + " #fpassw").val();
    let fimpw = $(formID + " #imgpwd").val();
    let frepass = $(formID + " #frepass").val();
    var emaiexp = RegExp(/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/);
    if (!(emaiexp.test(feid.toUpperCase()))) {
        return false;
    }
    var passExp = RegExp(/[a-zA-Z0-9_\.\+\-\=\&*$#^&]{6,25}|[a-zA-Z0-9]{6,25}/);
    if (passExp.test(fpass)) {
        if (typ == "reg") {
            var fnamExp = RegExp(/[\w \w]{2,25}/);
            if (!fnamExp.test(fname)) {
                console.log("NAME ERR");
                return false;
            }
            if (fpass != frepass) {
                console.log("2ndPass ERR");
                return false;
            }
        }
    }
    else {
        console.log("passw ERR");
        return false;
    }
    if (!(fimpw.split(".").length == 5)) {
        console.log("IBPWd ERR");
        return false;
    }
    passarr = [];
    $(".pimgs").removeClass("selected");
    $("#pimgsholder").fadeOut();
    return true;

}
var passarr = [];
var formFunction = "log";
$(document).ready(() => {
    init();
});










//___________________________________________________List SELECTION______________________________________________
$(document).ready(() => {
    $("#loginTypes").children().each((idx, el) => {
        $(el).click(frontMenuClick);
    }).attr("data-toggle", "tooltip").tooltip();

});



frontMenuClick = (e) => {
    $("#loginTypes").children().removeClass("active");
    e.preventDefault();
    let el = e.target;
    $(el).addClass("active");
    if ($(el).html().includes("Circle") || $(el).html().includes("Grid")) {
        if (!sessionStorage.getItem("loggedIn")) {
            $("#loginTypes").children()[0].click();
        }
        else {

            $($(el).html().split(" ").join("")).show();
        }
    }
};




//___________________________________________________FORM FUNCTIONS_______________________________________________
init = () => {
    $("#loadingmodal").modal("show");
    $("#loggedInDialog").hide();
    $("#sup2").hide();
    if (sessionStorage.getItem("loggedIn")) {
        $("#loginForm").hide();
        $("#loggedInDialog").show();
        $("#loadingmodal").modal("hide");
    }
    else {
        $("#frepassholder, #fnameholder").hide();
        $(".pimgs").click(pimgsHandle);
        setTimeout(() => {
            $("#loadingmodal").modal("hide");
            $("#pimgsholder").fadeIn("slow");
        }, 500);
    }
    $(getCurrentForm()).submit(submitForm);
    $("#logoutbtn").click(logout);
    $("#register").click(regPrep);
}
loginPrep = (e) => {
    $("#loadingmodal").modal("show");
    formFunction = "log";
    $("#regForm").remove();
    $("#register").text("New User").click(regPrep);
    $("#frepass, #fname").attr("required", false);
    $("#frepassholder, #fnameholder, #fname").hide();
    $("#lgnForm").submit(submitForm);
    $("#loginForm").show();
    setTimeout(() => {
        $("#loadingmodal").modal("hide");
        $("#pimgsholder").fadeIn("slow");
    }, 500);

};

regPrep = (e) => {
    $("#loadingmodal").modal("show");
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

    $("#regForm").submit(submitForm);
    $("#loginForm").hide();
    $("#frepass, #fname").attr("required", true);
    setTimeout(() => {
        $("#loadingmodal").modal("hide");
        $("#pimgsholder").fadeIn("slow");
    }, 500);
};


pimgsHandle = (e) => {
    let currForm = getCurrentForm();

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
    $("#loginTypes").children().;
    showUName();
}
logout = () => {
    sessionStorage.removeItem("loggedIn", false);
    sessionStorage.removeItem("userDet");
    $("#loginForm").show();
    $("#loggedInDialog").hide();
    $("#pimgsholder").fadeIn();
    clearForm();
}
submitForm = (e) => {
    let currForm = getCurrentForm();
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
                },
                beforeSend: () => {
                    $("#loadingmodal").modal("show");
                },
                complete: () => {
                    $("#loadingmodal").modal("hide");
                    clearForm();
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
                    //document.write(res);

                },
                error: (j, s, err) => {
                    console.log("Failed " + j + s + err);
                },
                beforeSend: () => {
                    $("#loadingmodal").modal("show");
                },
                complete: () => {
                    $("#loadingmodal").modal("hide");
                    clearForm();
                }
            });
        }
        else {
            $(currForm + " #sup2").html("Please check the errors!").show();
            console.log("Fail");
        }
    }

};

clearForm = () => {
    let formID = getCurrentForm();
    $(formID + " #fname").val("");
    $(formID + " #femailID").val("");
    $(formID + " #fpassw").val("");
    $(formID + " #imgpwd").val("");
    $(formID + " #frepass").val("");
    $("#loginTypes").children()[0].click();
}
validateForm = (typ = "log", form) => {
    let formID = getCurrentForm();
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


getCurrentForm = () => {
    if (formFunction == "log") {
        return "#lgnform";
    }
    else {
        return "#regform";
    }
}

//___________________________________________________________________________________________________________________________________________
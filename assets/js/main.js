var passarr = [];
$(document).ready(() => {
    $("#loadingmodal").modal("show");
    $("#loggedInDialog").hide();
    $("#sup2").hide();

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
});

pimgsHandle = (e) => {
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
        $("#ibp_sup1").addClass("bg-success").removeClass("bg-warning").html("Great job!");
        $("#imgpwd").val(passarr.join("."));
    }
    else {
        $("#ibp_sup1").addClass("bg-warning").removeClass("bg-success").html("Please select 5 images");
        $("#imgpwd").val("");
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
    e.preventDefault();
    if (validateForm($(e.target))) {

        $("#sup2, #ibp_sup1 ").hide();
        $.ajax({
            url: "login.php",
            method: "POST",
            data: {
                'useremail': $("#femailID").val(),
                'password': $("#fpassw").val(),
                'imgpwd': $("#imgpwd").val()
            },
            success: (res) => {
                let errcode = RegExp(/[E][0-9]{3}/);
                if (!errcode.test(res.loginStatus))
                    login(JSON.stringify({ 'name': res.loginStatus }));
                else {
                    logout();
                    $("#sup2").show();
                    $("#sup2").text("Login Failed, please check again!");
                }



            },
            error: (j, s, err) => {
                console.log("Failed " + s);
            }
        });
    }
    else {
        $("#sup2").html("Please check the errors!").show();
    }
};


validateForm = (form) => {
    let feid = $("#femailID").val();
    let fpass = $("#fpassw").val();
    let fimpw = $("#imgpwd").val();
    var emaiexp = RegExp(/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/);

    if (!(emaiexp.test(feid.toUpperCase()))) {
        return false;
    }

    if (!(fpass.length >= 6)) {
        return false;
    }
    if (!(fimpw.split(".").length == 5)) {
        return false;
    }
    passarr = [];
    $(".pimgs").removeClass("selected");
    $("#pimgsholder").fadeOut();
    return true;

}
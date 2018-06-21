
$(document).ready(() => {
    $("#loadingmodal").modal("show");
    $("#loggedInDialog").hide();
    var passarr = [];
    $(".pimgs").click((e) => {
        var r = $(e.target).attr("id").substr(3);
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
    }).on("load", () => {
        setTimeout(() => {
            $("#loadingmodal").modal("hide");
            $("#pimgsholder").fadeIn("slow");
        }, 500);
    });

    $("#sup2").hide();
    var req;
    $("#lgnform").submit((e) => {
        e.preventDefault();
        if (validateForm($(e.target))) {
            console.log("Post");
            $.ajax({
                url: "login.php",
                method: "POST",
                data: {
                    'useremail': $("#femailID").val(),
                    'password': $("#fpassw").val(),
                    'imgpwd': $("#imgpwd").val()
                },
                success: (res) => {
                    if (typeof (res) == 'object') {
                        localStorage.setItem("loggedIn", true);
                        localStorage.setItem("userDet", res);
                    }
                    else {
                        localStorage.setItem("loggedIn", false);
                        localStorage.removeItem("userDet");
                    }
                }
            });
        }
        else {
            $("#sup2").show();
        }
    });
});


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
    console.log("Success! sending now..");
    return true;

}
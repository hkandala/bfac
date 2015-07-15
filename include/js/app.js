/*----------------------Main Script--------------------------*/
var windowHeight = $(window).height();
var windowWidth = $(window).width();
var mainBodyHeight = windowHeight - 90;
var signUpBlock = false;

$(document).ready(function () {
	$('.loading').height(windowHeight);
    $('.menu').height(windowHeight);
    $('main.index .bg').height(windowHeight);
    $("#main-body-container").css("min-height", mainBodyHeight);
    $('#menuDashboard').click(function () {
        window.location = 'desking.php';
    });
    $('.menu-button').on("click", function () {
        $('body').toggleClass('nav_is_visible');
    });
    $('.contactUsTrigger, main').click(function () {
        $('body').removeClass('nav_is_visible');
    });
    $('.dropdown-button').dropdown({
            belowOrigin: true,
            constrain_width: false
        }
    );
    $(window).scroll(function () {
        if($(window).scrollTop()>=50) {
            if(!$('.navbar').hasClass('scrolled')) {
                $('.navbar').addClass('scrolled');
            }
        } else {
            if($('.navbar').hasClass('scrolled')) {
                $('.navbar').removeClass('scrolled');
            }
        }
        if($('header').hasClass("index")) {
            if($(window).scrollTop()>=(windowHeight/2)) {
                if(!$('.navbar-only').hasClass('scrolledIndex')) {
                    $('.navbar-only').addClass('scrolledIndex');
                }
            } else {
                if($('.navbar-only').hasClass('scrolledIndex')) {
                    $('.navbar-only').removeClass('scrolledIndex');
                }
            }
        }
    });
    if(windowWidth > 767) {
        var options = [
            {selector: 'main.index .news-wrapper .news-container', offset: 0, callback: 'showNews()' },
            {selector: 'main.index .organizers-wrapper .organizers', offset: 0, callback: 'showOrganizers()' }
        ];
        Materialize.scrollFire(options);
    }
    $('.modal-trigger').leanModal();
    $('a[href=#login]').click(function () {
        $('#login .modal-content .login-block').show();
        $('#login .progress').hide();
        $('#login .modal-content .signup-block').hide();
    });
    $('#login span').click(function () {
        $('#login .modal-content .login-block').hide();
        if(!signUpBlock) {
            $('#login .progress').show();
            $("#login .modal-content .signup-block").load('signup-form.php', function() {
                $('#login .progress').hide();
                $('#login .modal-content .signup-block').show();
                signUpBlock = true;
            });
        } else {
            $('#login .modal-content .signup-block').show();
        }
    });

    $(".login-form").submit(function(e) {
        e.preventDefault();
        return loginValidate();
    });
    $(".login-block #loginEmail").blur(function () {
        if(!loginEmailValidate()) {
            $(".login-block #loginEmail").addClass("invalid").removeClass("valid");
        } else {
            $(".login-block #loginEmail").addClass("valid").removeClass("invalid");
        }
    });
    $(".login-block #loginPassword").blur(function () {
        if(!loginPasswordValidate()) {
            $(".login-block #loginPassword").addClass("invalid").removeClass("valid");
        } else {
            $(".login-block #loginPassword").addClass("valid").removeClass("invalid");
        }
    });
});

$(window).load(function() {
    $('.loading').fadeOut(300);
    $('main.index .bg .tempHover').css({ "opacity": "1", "transform": "translateY(-50%)"});
    $('main.index .bg .startProject').css({ "opacity": "1", "transform": "translate(-50%, -50%)"});
});

function showNews() {
    $('main.index .news-wrapper .news-container').css({ "opacity": "1", "transform": "none"});
}

function showOrganizers() {
    console.log("check");
    $('main.index .organizers-wrapper .organizers').css({ "opacity": "1", "transform": "none"});
}

function loginEmailValidate() {
    var mail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,4}))$/;
    var em = $(".login-block #loginEmail").val();
    return mail.test(em);
}

function loginPasswordValidate() {
    var pass = $(".login-block #loginPassword").val();
    return (pass.length >= 5);
}

function loginValidate () {
    if(!loginEmailValidate()) {
        $(".login-block #loginEmail").addClass("invalid").removeClass("valid");
    }
    if(!loginPasswordValidate()) {
        $(".login-block #loginPassword").addClass("invalid").removeClass("valid");
    }
    if(loginEmailValidate() && loginPasswordValidate()) {
        var loginObj = {
            email: $(".login-block #loginEmail").val(),
            password: $(".login-block #loginPassword").val()
        };
        $(".login-form .loadingButton .preloader-wrapper").fadeIn('fast');
        $.post('loginCheck.php', loginObj, function(response) {
            if(response == 'Logged In') {
                $('.login-form .feedback').html(response);
                window.location = 'desking.php';
            } else if (response != '') {
                $(".login-form .loadingButton .preloader-wrapper").fadeOut('fast');
                $('.login-form .feedback').html(response);
            } else {
                $(".login-form .loadingButton .preloader-wrapper").fadeOut('fast');
                $('.login-form .feedback').html('Unknown Error, Please try again');
            }
        }).fail(function() {
            $(".login-form .loadingButton .preloader-wrapper").fadeOut('fast');
            $('.login-form .feedback').html('Unable to connect to the network');
        });
    }
    return (loginEmailValidate() && loginPasswordValidate());
}
/*-----------------------------------------------------------*/

/*----------------------Page Script--------------------------*/
$(document).ready(function () {
    if($('main').hasClass('desk')) {
        $.post('dashboard.php', function(data) {
            $(".desk .preloader-wrapper").addClass("hide");
            $('.desk .content-container').html(data);
        }).fail(function () {
            $(".desk .preloader-wrapper").addClass("hide");
            $(".desk .unableToConnect").removeClass("hide");
        });
        $(".menu #Dashboard").click(function() {
            changeTab('Dashboard', 'dashboard.php');
        });
        $(".menu #Challenges").click(function() {
            changeTab('Challenges', 'showChallenges.php');
        });
        $(".menu #MyProjects").click(function() {
            changeTab('MyProjects', 'showMyProjects.php');
        });
        $(".menu #NewProject").click(function() {
            changeTab('NewProject', 'addNewProject.php');
        });
        $(".menu #EditProject").click(function() {
            changeTab('EditProject', 'editProject.php');
        });
    }
});

function changeTab (id, fileName) {
    $(".menu a").removeClass("selected");
    $('.menu #' + id ).addClass("selected");
    $('body').removeClass('nav_is_visible');
    $(".desk .content-container").empty();
    $(".desk .preloader-wrapper").removeClass("hide");
    $(".desk .unableToConnect").addClass("hide");
    $.post(fileName, function(data) {
        $(".desk .preloader-wrapper").addClass("hide");
        $('.desk .content-container').html(data);
        if(id == 'Challenges') {
            initCollapsible();
        } else if(id == 'MyProjects') {
            initCollapsible();
            initNoProjects();
        } else if(id == 'NewProject') {
            initSelect();
        }
    }).fail(function () {
        $(".desk .preloader-wrapper").addClass("hide");
        $(".desk .unableToConnect").removeClass("hide");
    });
}

function initCollapsible () {
    $('.collapsible').collapsible({
        accordion : false
    });
}

function initModal () {
    $('.modal-trigger').leanModal();
}

function initNoProjects () {
    $(".content-container .no-projects h5 span").click(function() {
        changeTab('NewProject', 'addNewProject.php');
    });
}

function initSelect () {
    $('select').material_select();
}
/*-----------------------------------------------------------*/
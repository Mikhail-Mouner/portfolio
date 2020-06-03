$(document).ready(function () {
    var navLink=$('.nav-link');
    //********* page loader js
    setTimeout(function () {
        $('.loader_bg').fadeToggle();
    }, 2000);

    //nise scroll
    $("body").niceScroll({
        cursorcolor: "#016194",
        cursorwidth: "15px",
        cursorborderradius:20,
        background:"rgba(20,20,20,0.3)",
        cursorborder:"1px solid white"
    });
    //back to top
    $("#backtotop").click(function () {
        $("body,html").animate({
            scrollTop: 0
        }, 600);
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() > 150) {
            $("#backtotop").addClass("visible");
            $(".chat").addClass("visible");
        } else {
            $("#backtotop").removeClass("visible");
            $(".chat").removeClass("visible");
        }
    });
    $(".down a").on('click',function() {
        $('html,body').animate({scrollTop: $("#about").offset().top -50},1500);
    });
    //chat
    $(".chat-icon").on('click',function() {
        $('form').toggleClass("visible");
        checkErrors();
    });
    //tooltips on input
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });


    //validation form
    var formError=[true,true,true];
    $(".name").keyup(function () {
       if($(this).val().length > 3){
           $(this).css("border-bottom","solid 4px green");
           $(this).next(".asterisk").addClass("invisible");
           formError[0]=false;
       }else {
           $(this).css("border-bottom","solid 4px red");
           $(this).next(".asterisk").removeClass("invisible");
           formError[0]=true;
       }
        checkErrors();
    });
    $(".email").keyup(function () {
        if($(this).val()=== ""){
            $(this).css("border-bottom","solid 4px red");
            $(this).next(".asterisk").removeClass("invisible");
            formError[1]=true;
        }else {
            $(this).css("border-bottom","solid 4px green");
            $(this).next(".asterisk").addClass("invisible");
            formError[1]=false;
        }
        checkErrors();
    });
    $(".message").keyup(function () {
        if($(this).val().length > 10){
            $(this).css("border-bottom","solid 4px green");
            $(this).next(".asterisk").addClass("invisible");
            formError[2]=false;
        }else {
            $(this).css("border-bottom","solid 4px red");
            $(this).next(".asterisk").removeClass("invisible");
            formError[2]=true;
        }
        checkErrors();
    });
    function checkErrors() {
        if (formError[0]===true||formError[1]===true||formError[2]===true){
            $("#sendMssg").addClass("disabled");
        }
        else {$("#sendMssg").removeClass("disabled").removeAttr("disabled") ;}
    }
    //stick navabr
    var header = document.getElementById("myHeader");
    window.onscroll = function() {
        if (window.pageYOffset > header.offsetTop) {
            header.classList.add("fixed-top","col-10","m-auto");
        } else {
            header.classList.remove("fixed-top","col-10","m-auto");
        }
    };
    /*
    //links add act class

    navLink.click(function () {
        $(this).parent().addClass('act').siblings().removeClass('act');
    });
    */
    //spy scroll
    $('body').scrollspy({ target: '#myHeader' });
    //smooth scroll
     navLink.click(function () {
     $('html,body').animate({scrollTop:$('#'+$(this).data('value')).offset().top -100},1000);
     });
    //*** wow js
    new WOW().init();
});
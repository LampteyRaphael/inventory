// jQuery(function($){
//    $(".sidebar-dropdown >a").click(function(){

//     $(".sidebar-submenu").slideUp(200);

//     if(
//       $(this)
//       .parent()
//       .hasClass("active")
//     ){
//       $("sidebar-dropdown").removeClass("active");

//       $(this).
//       parent().
//       removeClass("active");
//     }else{
//       $(".sidebar-dropdown").removeClass("active");
//       $(this)
//       .next("slidebar-submenu")
//       .slideDown(200);
//       $(this)
//       .parent()
//       .addClass("active");
//     }
//    });

//    $("#close-sidebar").click(function(){
//      $(".page-wrapper").removeClass("toggled");
//    });

//    $("#show-sidebar").click(function(){
//      $(".page-wrapper").addClass("toggled");
//    });

// });

$(document).ready(function() {
    $('.select').select2();
});


jQuery(function ($) {

    // Dropdown menu
    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
        }

    });

    $("#close-sidebar").click(function(){
        $(".page-wrapper").removeClass("toggled");
      });
   
      $("#show-sidebar").click(function(){
        $(".page-wrapper").addClass("toggled");
      });
   

    //toggle sidebar
    $("#toggle-sidebar").click(function () {
        $(".page-wrapper").toggleClass("toggled");
    });
    //Pin sidebar
    $("#pin-sidebar").click(function () {
        if ($(".page-wrapper").hasClass("pinned")) {
            // unpin sidebar when hovered
            $(".page-wrapper").removeClass("pinned");
            $("#sidebar").unbind( "hover");
        } else {
            $(".page-wrapper").addClass("pinned");
            $("#sidebar").hover(
                function () {
                    console.log("mouseenter");
                    $(".page-wrapper").addClass("sidebar-hovered");
                },
                function () {
                    console.log("mouseout");
                    $(".page-wrapper").removeClass("sidebar-hovered");
                }
            )

        }
    });


    //toggle sidebar overlay
    $("#overlay").click(function () {
        $(".page-wrapper").toggleClass("toggled");
    });

    //switch between themes 
    var themes = "default-theme legacy-theme chiller-theme ice-theme cool-theme light-theme";
    $('[data-theme]').click(function () {
        $('[data-theme]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(themes);
        $('.page-wrapper').addClass($(this).attr('data-theme'));
    });

    // switch between background images
    var bgs = "bg1 bg2 bg3 bg4";
    $('[data-bg]').click(function () {
        $('[data-bg]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(bgs);
        $('.page-wrapper').addClass($(this).attr('data-bg'));
    });

    // toggle background image
    $("#toggle-bg").change(function (e) {
        e.preventDefault();
        $('.page-wrapper').toggleClass("sidebar-bg");
    });

    // toggle border radius
    $("#toggle-border-radius").change(function (e) {
        e.preventDefault();
        $('.page-wrapper').toggleClass("boder-radius-on");
    });

    //custom scroll bar is only used on desktop
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $(".sidebar-content").mCustomScrollbar({
            axis: "y",
            autoHideScrollbar: true,
            scrollInertia: 300
        });
        $(".sidebar-content").addClass("desktop");

    }
});





// var add= document.getElementById('add');


// add.addEventListener('click',function(){

//    alert("Hello!, Do you want to add?");


// });


var i = 0;
var original = document.getElementById('duplicater');

function duplicate() {
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "duplicater" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    original.parentNode.appendChild(clone);
}


$(document).on('click', '#remove', function(e) {
    e.preventDefault();
    $(this).closest('.row').remove();
})
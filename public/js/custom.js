$(document).ready(function () {
    let navOuterHeight = $(".navbar").outerHeight();
    $(".custom-container").css({"margin-top": navOuterHeight  + 20});
    $("body").css({"min-height": window.innerHeight - navOuterHeight + 20})
    // if($(".top-top-nav").outerHeight() > 116){
    //     $(".top-top-nav").css({"height": "100px"});
    // }
});

$(window).resize(function () {
    let navOuterHeight = $(".navbar").outerHeight();
    $(".custom-container").css({"margin-top": navOuterHeight + 20})
    $("body").css({"min-height": window.innerHeight - navOuterHeight + 20})
});

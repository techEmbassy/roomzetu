$(window).resize(function () {
    var width = $(window).width();
    if (width <= 1000) {
        $(".fixed-tb thead:eq(1)").hide();

    } else {
        $(".fixed-tb thead:eq(1)").show();

    }

})

function fixTableHead(id) {

//    var table = $(id),
//        thead = table.find('thead'),
//        theadClone, window = $(window);
//
//    if (!(table.hasClass('fixed-tb'))) {
//        thead.find('th').each(function () {
//            var th = $(this);
//            th.css('width', th.innerWidth());
//        });
//
//        theadClone = thead.clone();
//        thead.after(theadClone);
//        var top = thead.offset().top;
//        var left = thead.offset().left;
//        theadClone.css({
//            top: top,
//            left: left,
//            width: thead.outerWidth(),
//            position: 'fixed'
//
//        });
//
//
//        table.addClass("fixed-tb");
//
//      
//    }
}


function fixSubStrip() {

    var ss = $(".substrip"),
        w = ss.innerWidth(),
        h = ss.innerHeight(),
        top = ss.offset().top;
    //alert(999)
    ss.css({
        position: 'fixed',
        top: 'top',
        width: w,
        height: h,
        background: '#fff'
    });

}

//disable('select')

function nt(m) {
    var l = "<div class='show'><i class='fa fa-spin fa-spinner'></i> <span id=\"text\"> " + m + "</span></div>";
    $('body').prepend(l)
}

nt("savings...");

$(".toggle-menu").click(function (e) {
    // alert(3)
    $(".menu-mobile").toggleClass("open")

});



function enable(el) {
    el.prop("disabled", false);
    el.removeClass("disabled");
    // alert (el.attr('class'))
}

function disable(el) {
    el.prop("disabled", true);
    el.addClass("disabled");
    //    alert(9);
}

refreshHeight();
 function refreshHeight() {
        if ($(".table").length) {
            var table = $(".table");
            var top = table.offset().top;
            var h = $(window).height() - top - 20;
            table.parents(".c-body").css({
                
            })
        }
     
//     alert("99")

    }

function showDetails() {
    $('#booking-details').modal('show');
}
var currStep = 0;

function gotoStep(num) {
    //    alert(num)
    
    if(!isNaN(num)){
    var targetNext = $('.steps .step-item.active').next();
    var targetPrev = $('.steps .step-item.active').prev();

    var nextB = $('.steps .step-control.next');
    var prevB = $('.steps .step-control.prev');

    if (num == -1) {
        $('#btn-preview-invoice').hide();
        $('.btn-next').html('Next <i class="fa fa-angle-right"></i>');
    }

    currStep = currStep + num;

    if (currStep < 0) {
        currStep = 0;
    } else if (currStep > 3) {
        currStep = 3
    }
    if ($('.steps .step-item:eq(' + currStep + ')').length > 0) {
        //alert(currStep)
        $('.steps .step-item').removeClass('active');
        $('.steps .step-item:eq(' + currStep + ')').addClass('active');
    }



    var i = $('.steps .step-item.active').index();

    var title = "";

    switch (i) {
        case 0:
            title = "Select Room"
            break;
        case 1:
            title = "Guest Info"


            break;
        case 2:
            title = "Reservation Summary"
            break;
        case 3:
            title = "Finish Reservation"
            break;


    }
        
    }
    else{
        $('.steps .step-item').removeClass('active');
        $('.steps .step-item' + num ).addClass('active');
        
        if(num == "#done"){
           $("#new-booking .modal-footer *").hide();
           }
    }

}


function clickNext() {

    $('.steps .step-item.active .next').click();
}


function printHtml(title, contents) {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();


        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>' + title + '</title>');
        frameDoc.document.write('</head><body>');


        //Append the external CSS files.
        frameDoc.document.write('<link href="css/print.css" rel="stylesheet" type="text/css" />');
        //        frameDoc.document.write('<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />');


        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    }
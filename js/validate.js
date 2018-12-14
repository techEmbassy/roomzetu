   function inputsEmpty(element) {
       var empty = false;
       // $(".shakeme").removeClass("shakeme");

       $(".error-alert").remove();


       $(element + " [required]").each(function (i, input) {
           ///alert(99);
           var msg = $(input).attr("data-empty-message");
           msg = msg == undefined ? "Please fill in this feild" : msg;
           $(input).css({
               "border-color": '#ddd'
           });
           if ($(input).val() == "") {
               empty = true;
               errorMSG(input, msg);


           }

       });

       if (empty == false) {
           empty = inputValid(element) == true ? false : true;
       }

       if (empty) {
           //var t = $(element).offset().top;
           //alert(t)
           location = element;
       }
       return empty;

   }

   function inputValid(element) {

       var valid = true;
       // $(".shakeme").removeClass("shakeme");

       $(".error-alert").remove();


       $(element + " [data-input]").each(function (i, input) {
           ///alert(99);
           var msg = $(input).attr("data-invalid-message");
           var inputType = $(input).attr("data-input");
           var val = $(input).val();
           val = val.replace(/\s+/g, '');
           if (val != "") {
               msg = msg == undefined ? "invalid input" : msg;
               $(input).css({
                   "border-color": '#ddd'
               });

               switch (inputType) {
                   case "number":
                       if (isNaN(val)) {
                           valid = false;
                           errorMSG(input, msg);

                       }
                       break;

                   case "letters":
                       if (isNaN(val) == false) {
                           valid = false;
                           errorMSG(input, msg);

                       }
                       break;

                   case "email":
                       if (!emailValid(val)) {
                           valid = false;
                           errorMSG(input, msg);

                       }

                       break;
               }

           }

       });

       return valid;
   }


   function errorMSG(input, msg) {
       if ($(input).parent().hasClass("fg-line") || $(input).parent().hasClass("input-group")) {
           $(input).parent().after("<div class='row c-red error-alert' style='padding-left:15px'>" + msg + "</div>");
       } else {
           if ($(input).next().hasClass("error-alert")) {
               $(input).next().remove();
           }
           $(input).after("<div class='row c-red error-alert' style='padding-left:15px'>" + msg + "</div>");
       }


       $(input).addClass("shakeme");
       $(input).css({
           "border-color": 'firebrick'
       });


       setTimeout(function () {
           $(input).removeClass("shakeme");
       }, 300);
   }


   function emailValid(email) {
       var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;



       return pattern.test(email);
   }

   $(document).on("click", "input[required], [required]", function () {
       //alert(33)
       if ($(this).next().hasClass("error-alert")) {
           $(this).next().remove();
       }
       if ($(this).parent().next().hasClass("error-alert")) {
           $(this).parent().next().remove();
       }
   })

var previousScroll = 0;
var headerOrgOffset = $('.banner').height();

$(window).scroll(function(){
     var currentScroll = $(this).scrollTop();
     $(".sticky").each(function(i, sticky){
     var offsetTop = $(sticky).attr("data-offset-top");
     var currOffsetTop = $(sticky).offset().top
     
        
        
       
    if (currentScroll > previousScroll) {
        //scrolling down
       
if(currentScroll >= offsetTop){
   $(sticky).addClass("fixed"); 
    $(sticky).css({position:'fixed', top:0})
}
        
         
        
        
    } 
    
    else {
        
        //scrolling up
         
       if(currentScroll <= offsetTop){
       $(sticky).removeClass("fixed");
            $(sticky).css({position:'absolute', top:42})
} 
        

    }
         
     
    previousScroll = currentScroll;
        
        
    })
})
//var loader = function(data){
//    var d = JSON.parse(data);
//    this.message = d.message;
//    
//    this.container = "<div class='la-loader'><i class='fa fa-spin fa-spinner'></i> "+ this.message +"</div>";
//    this.show = function(){
//     alert(this.message)   
//    }
//    
//    
//
//}




//alert(0)

function loader(element,msg){
    
    $(element).html("<i class='fa fa-spin fa-spinner'> "+msg+"</i>");
    
}
function tinyloader(element,msg){
    
    $(element).html("<span style='font-size:9pt; color:dodgerblue'><i class='fa fa-spin fa-spinner'> "+msg+"</i></span>");
    
}

//alert(88)
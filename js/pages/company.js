<script >


$(function() {
       getNoBranches();
       getBranches();
     });

               function deleteBranch(id){

                  var token="deletebranch";

    			  $.ajax({   			 
                  type: "POST",
                  url: "php/form_actions/post_form.php",
                  data: {token: token,id:id},
                  success: function(data) { 
				  
				  if(data==1){
				  getNoBranches();
                  getBranches();
				  
				  }
    			 
				 
				 }});
				}

               function getNoBranches(){

                 var token="get_no_of_branches";

    			  $.ajax({
    			 
                  type: "POST",
                  url: "php/form_actions/get_results.php",
                  data: {token: token},
                  success: function(data) { 
				  
				  $("#no_of_branches").html(data);
    			 
				 
				 }});
				}
				
				function addBranch(){

                 var token="addbranch";

				 branch_name =document.getElementById("branch_name").value;
				 branch_country = document.getElementById("branch_country").value;
				 branch_time_zone = document.getElementById("branch_time_zone").value;
				 branch_address = document.getElementById("branch_address").value;
				 
				 
    			 $.ajax({
    			 
                  type: "POST",
                  url: "php/form_actions/post_form.php",
                  data: {token: token,branch_name: branch_name,branch_country: branch_country,branch_time_zone: branch_time_zone,branch_address:branch_address },
                  success: function(data) { 
				  
				  
				 // $("#no_of_branches").html(data);
    			 //location.reload();
				 
				 if(data==1){
				  getNoBranches();
                  getBranches();
				  $("#branch_close").click();
				 }
				 
				 }});
				}
				
                function getBranches(){

                 var token="get_branches";

    			  $.ajax({
    			 
                  type: "POST",
                  url: "php/form_actions/get_results.php",
                  data: {token: token},
                  success: function(data) { 
				  
				  $("#branches").html(data);
    			 
				 
				 }});
				}

    
</script>
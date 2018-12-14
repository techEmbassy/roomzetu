<?php include 'includes/auth.php'?>
<?php if(($role==6)||$role==5){
     header("Location: rooms.php");
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
<?php include 'includes/styles.php'?>
</head>
<style>
    .card {
        /*            box-shadow: 0 0 10px rgba(0,0,0,0.2)*/
        /*        border-color: #ccc;*/
    }

    .unit-cell {
        text-align: center;
    }

    .table td {
        margin-bottom: 0px !important;
        /*        vertical-align: top;*/
    }

    .table th,
    .table td {
        /*        padding: 0.75rem;*/
        vertical-align: middle;
        /*    border-top: 1px solid #eceeef;*/
    }

</style>

<body class="gray">
    <?php $mpos=4; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2">

                    <p><small>Manage room rates, kids rates and agent rates</small> </p>
                    <hr/>
                    <div class="sub-menu">
                        <?php $sbPos=1; include 'includes/rates-menu.php';?>


                    </div>
                    <!-- <div class="foot pt-4 pl-2 text-left ">
                        <a class="btn btn-sm btn-secondary" data-target="#change-season" data-toggle="modal"><i class="fa fa-plus"></i> New Season</a>
                    </div> -->

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">

                            <div class="row">
                                <div class="col-md-3">
                                    Seasons Calendar
                                </div>

                                <div class="col-md-9 text-right">

                                   <!-- <input class="form-control tiny" placeholder="search" oninput="searchPrice(this)" />-->



                                    <select class="form-control tiny" id="properties" onchange="getSeasons()">
                                        <?php echo $propertyOptions0; ?>
    
                                    </select>

                                    <!--<a class="btn btn-secondary btn-35" href="" data-target="#new-px" data-toggle="modal"><i class="fa fa-plus"></i> New Season</a>-->



                                </div>
                            </div>
                        </div>
                        <div class="c-body p-2" style="background-color:#f9f9f9" id="seasons-calendar">

                            <style>
                                .tag {
                                    padding: 10px;
                                    display: inline-block;
                                    background: #fafafa;
                                    color: #000;
                                    margin: 1px;
                                    min-width: 16.666%;
                                }
                                .tag-after {
                                    padding: 10px;
                                    display: inline-block;
                                    background: #a9cb73;
                                    color: #fff;
                                    margin: 1px;
                                    min-width: 16.666%;
                                }
								
								.tag-after-low {
                                    padding: 10px;
                                    display: inline-block;
                                    background: #979f8b;
                                    color: #fff;
                                    margin: 1px;
                                    min-width: 16.666%;
                                }


                                .table,
                                .text-wrap table {
                                    width: 100%;
                                    max-width: 100%;
                                    margin-bottom: 1rem;
                                    background-color: transparent;
                                }

                                .card-table {
                                    margin-bottom: 0;
                                }

                                .table td input,
                                .table td .form-control {
                                    display: block;
                                    width: 100%;
                                    border: none;
                                    height: 30px;
                                    outline: none;
                                }

                                #addMore:hover {
                                    color: darkblue;

                                    width: 50%;
                                    height: 10px;
                                    border-radius: 25px !important;
                                }

                            </style>

                            <div class="card mb-2">

                                <div class="row p-3">
                                    <div class="col-md-7 ">
                                        <h5>High Season / Peak Season</h5>
                                        <!--
<p>5 Months</p>
<a>23rd Nov - 14th June</a>-->

                                        <table class="table table-hover table-bordered text-wrap card-table small-text" id="tb_high">
                                              <!-- <tr class="tr-header">
                                                <th>#</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>

                                                <th><a href="javascript:void(0);" style="font-size:18px;" id="addPeriodForHigh" title="Add More Seasons"><span class="fa fa-plus"></span></a></th>
                                                </tr>
                                                <tr style="background-color:#fafafa">
                                                    <td>
                                                        <label>1</label>
                                                    </td>
                                                    <td><input id="0" type="text" onchange="updateStartDate(this)" name="start_date" placeholder="start date" class="form-control high"></td>

                                                    <td><input id="0" type="text" onchange="updateStartDate(this)" placeholder="end date" name="end_date" class="form-control high"></td>

                                                    <td><a href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>
                                                </tr>-->
                                        </table>


                                    </div>

                                    <div class="col-md-5" id="high_months">
                                        <span  id="Jan" class="tag">Jan</span><span  id="Feb" class="tag">Feb</span><span  id="Mar" class="tag">Mar</span><span id="Apr" class="tag">Apr</span><span id="May" class="tag">May</span><span id="Jun" class="tag">Jun</span><span id="Jul" class="tag">Jul</span><span id="Aug" class="tag">Aug</span><span id="Sep" class="tag">Sep</span><span  id="Oct" class="tag">Oct</span><span  id="Nov" class="tag">Nov</span><span id="Dec" class="tag">Dec</span>

                                    </div>



                                </div>

                            </div>

                            <div class="card">

                                <div class="row p-3">
                                    <div class="col-md-7">
                                        <h5>Low Season</h5>
                                        <!--
                                        <p>5 Months</p>
                                        <a>23rd Nov - 14th June</a>
-->

                                        <table class="table table-hover table-bordered text-wrap card-table small-text" id="tb_low">
                                               <!-- <tr class="tr-header">
                                                <th>#</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>

                                                <th><a href="javascript:void(0);" style="font-size:18px;" id="addPeriodForLow" title="Add More Seasons"><span class="fa fa-plus"></span></a></th>
                                                <!--</tr>-->
                                                <!--<tr style="background-color:#fafafa">
                                                    <td>
                                                        <label>1</label>
                                                    </td>
                                                    <td><input id="0"  onchange="updateStartDate(this)" type="text" name="start_date" placeholder="start date" class="form-control low"></td>

                                                    <td><input id="0" onchange="updateStartDate(this)" type="text" placeholder="end date" name="end_date" class="form-control low"></td>

                                                    <td><a href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>
                                                </tr>-->
                                        </table>



                                    </div>

                                    <div class="col-md-5" id="low_months" >

                                        <span  id="Jan" class="tag">Jan</span><span  id="Feb" class="tag">Feb</span><span  id="Mar" class="tag">Mar</span><span id="Apr" class="tag">Apr</span><span id="May" class="tag">May</span><span id="Jun" class="tag">Jun</span><span id="Jul" class="tag">Jul</span><span id="Aug" class="tag">Aug</span><span id="Sep" class="tag">Sep</span><span  id="Oct" class="tag">Oct</span><span  id="Nov" class="tag">Nov</span><span id="Dec" class="tag">Dec</span>

                                    </div>

                                    <!--
                                    <div class="col-md-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" data-toggle="modal" data-target="#change-season" class="btn btn-sm btn-outline-info">Change</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </div>
                                        </div>

                                    </div>
-->



                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>


<!-- /.modal -->





<?php include 'includes/footer.php';?>


<script>
   
    $(function() {
        $('#addPeriodForHigh').on('click', function() {
            var data = $("#tb_high tr:eq(1)").clone(true).appendTo("#tb_high");
            data.find("input").val('');
        });
       
    });

    $(function() {
        $('#addPeriodForLow').on('click', function() {
            
            var data = $("#tb_low tr:eq(1)").clone(true).appendTo("#tb_low");
            
        });
        $(document).on('click', '.remove', function() {
            var trIndex = $(this).closest("tr").index();
            if (trIndex > 1) {

                deleteSeason(this);
                
            } else {
                alert("Sorry!! Can't remove first row!");
            }
        });

        getSeasons();
    });

function gettoday() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = mm + '-' + dd + '-' + yyyy;

        return today;
    }
  

 function updateStartDate(t) {
          var pid = $("#properties").val();
          var input = $(t),
            date = input.val();
             var id = input.attr("id");

           var  date_ = date.split("/");
            var date__ = date_[2] + "-" + date_[0] + "-" + date_[1];

            
             var today = new Date();
             //var dd = today.getDate();
             //var mm = today.getMonth() + 1; //January is 0!

             var yyyy = today.getFullYear();

             var selected_date = new Date(date__);

             var yyyy_ = selected_date.getFullYear();

           
          
            if (yyyy != yyyy_) {
                alertify.error("<i class='fa fa-check-circle'></i> You can only select dates in the current year");
                getSeasons();
            }else{

                   var period={};
           switch (input.attr("class")) {

            case "datepicker form-control low":

                var season = "low";

                 if(input.attr("name")==="start_date"){

                 period = JSON.stringify({
                   start_date: date__,
                   property_id: pid,
                   season: season
                    
                   });

                 }else{
                    period = JSON.stringify({
                    end_date: date__,
                    property_id: pid,
                    season: season
                   });

                 }
               
                break;
            case "datepicker form-control high":
                  var season= "high";
                  if(input.attr("name")==="start_date"){

                   period = JSON.stringify({
                    start_date: date__,
                    property_id: pid,
                    season: season
                    
                   });

                  }else{
                    period = JSON.stringify({
                    end_date: date__,
                    property_id: pid,
                    season: season

                   });

                 }
                break;         

        }
        update_season(id, date,period);


            } 


         
 }


 function update_season(id, date,period) {

        if (!(date.isNaN || date == "")) {
            $.post("src/xhr.php", {
                action: "update_season",
                period: period,

                id: id,

            }, function(data) {
                //alert(data);
                alertify.success("<i class='fa fa-check-circle'></i> Season updated");
                getSeasons();
            });
        }

    }


     function getSeasons() {
        var pid = $("#properties").val();
        
        $.post("src/get_data.php", {
            token: "seasons",
            property_id: pid
        }, function(data) {
            console.log(data);
           // alert(data);
            setSeasons(data);
        })
    }




     function setSeasons(data) {

        var seasons = JSON.parse(data);
        setHighSeason(seasons);
        setLowSeason(seasons);

    }
  
  function populateCalender(months,html_id,class_name){
      
       var monthNames=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
      $.each(monthNames, function(i, p) {
          
         
       $("#"+html_id+" #"+p).removeClass("tag")

       if($("#"+html_id+" #"+p).attr("class")!="tag"){

         $("#"+html_id+" #"+p).removeClass(class_name)
         $("#"+html_id+" #"+p).addClass("tag")
       }

      });

      $.each(months, function(i, p) {
          
         
       $("#"+html_id+" #"+p).removeClass("tag")
        $("#"+html_id+" #"+p).addClass(class_name)

      });

      

   }

   function loadCalender(months,start_date,end_date){

    var monthNames=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
      sdate = new Date(start_date);
      edate = new Date(end_date);
      //var day =date.getDate();
      var monthIndex_s= sdate.getMonth();
      var monthIndex_e= edate.getMonth();

      //alert(monthIndex_s +" "+monthIndex_e )

      var year_s =sdate.getFullYear();
      var year_e =edate.getFullYear();

      if(year_s!=year_e){
          
          return months;

      }else{
           if(monthIndex_s==monthIndex_e){
            
           var index= months.indexOf(monthNames[monthIndex_s]);
           if(index==-1){

            months.push(monthNames[monthIndex_s]);
            return months;

           }

           }else{

               for (var i = monthIndex_s; i < monthIndex_e + 1 ; i++) {
                  
                  var index= months.indexOf(monthNames[i]);
                   if(index==-1){

                    months.push(monthNames[i]);
                   }
                  

               }
               return months;


           }
         

      }

   }

    function setHighSeason(seasons){

                  var table_head_high="";


                    table_head_high+="<tr class=\"tr-header\">";
                    table_head_high+="<th>#</th>";
                    table_head_high+="<th>Start Date</th>";
                    table_head_high+="<th>End Date</th>";
                    table_head_high+="<th><a href=\"javascript:void(0);\" style=\"font-size:18px;\" id=\"addPeriodForHigh\" title=\"Add More Seasons\"><span class=\"fa fa-plus\"></span></a></th></tr>";
                           
                        var rows_high = "";
                        var high_months=[];
                        
                        if(seasons.high.length!=0){
                            

                           $.each(seasons.high, function(i, p) {
                                   start_date_ = p.start_date.split("-");

                                   high_months=loadCalender(high_months,p.start_date,p.end_date);

                                   start_date = start_date_[1] + "/" + start_date_[2] + "/" + start_date_[0];

                                   end_date_ = p.end_date.split("-");

                                   end_date = end_date_[1] + "/" + end_date_[2] + "/" + end_date_[0];


                                   if(p.start_date=="0000-00-00"){

                                      start_date="";
                                    }
                                    if(p.end_date=="0000-00-00"){

                                      end_date="";
                                    }
                                  counter= i+1;
                                  rows_high+="</tr>";
                                  rows_high+="<tr style=\"background-color:#fafafa\">";
                                  rows_high+="<td>";
                                  rows_high+="<label>"+counter+"</label>";
                                  rows_high+="</td>";
                                  rows_high+="<td><input id=\""+p.id+"\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" value=\""+ start_date+"\" placeholder=\"start date\" class=\"datepicker form-control high\"></td>";

                                  rows_high+="<td><input id=\""+p.id+"\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" value=\""+ end_date+"\" name=\"end_date\" class=\"datepicker form-control high\"></td>";

                                  rows_high+="<td><a  id=\""+p.id+"\" href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                  rows_high+="</tr>";

                            });

                            $("#high_months").html('<span  id="Jan" class="tag">Jan</span><span  id="Feb" class="tag">Feb</span><span  id="Mar" class="tag">Mar</span><span id="Apr" class="tag">Apr</span><span id="May" class="tag">May</span><span id="Jun" class="tag">Jun</span><span id="Jul" class="tag">Jul</span><span id="Aug" class="tag">Aug</span><span id="Sep" class="tag">Sep</span><span  id="Oct" class="tag">Oct</span><span  id="Nov" class="tag">Nov</span><span id="Dec" class="tag">Dec</span>');

                           //alert(JSON.stringify(high_months));
                           populateCalender(high_months,"high_months","tag-after");

                        }else{
                              
                              populateCalender(high_months,"high_months","tag-after");
                                  counter= 1;
                                  rows_high+="</tr>";
                                  rows_high+="<tr style=\"background-color:#fafafa\">";
                                  rows_high+="<td>";
                                  rows_high+="<label>"+counter+"</label>";
                                  rows_high+="</td>";
                                  rows_high+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" placeholder=\"start date\" class=\"datepicker form-control high\"></td>";

                                  rows_high+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" name=\"end_date\" class=\"datepicker form-control high\"></td>";

                                  rows_high+="<td><a  href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                  rows_high+="</tr>";


                        }
                            

                            $("#tb_high").html(table_head_high+rows_high);

                            $('#addPeriodForHigh').on('click', function() {

                               var current_row =$("#tb_high tr").length-1;

                               var data = $("#tb_high tr:eq("+current_row+")");
                               //alert(data.find("input").attr("id"))

                               if(data.find("input").attr("id")!=0){
                                 var rows_high_="";

                                 counter= parseInt(data.find("label").html()) +1;
                                  rows_high_+="</tr>";
                                  rows_high_+="<tr style=\"background-color:#fafafa\">";
                                  rows_high_+="<td>";
                                  rows_high_+="<label>"+counter+"</label>";
                                  rows_high_+="</td>";
                                  rows_high_+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" placeholder=\"start date\" class=\"datepicker form-control high\"></td>";

                                  rows_high_+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" name=\"end_date\" class=\"datepicker form-control high\"></td>";

                                  rows_high_+="<td><a  href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                 rows_high_+="</tr>";

                                $("#tb_high").append(rows_high_);
                                 startDatePicker();

                               }
                              // data.find("input").val('');
                             });
                             startDatePicker();
    }


    function setLowSeason(seasons){

                  var table_head_low="";


                    table_head_low+="<tr class=\"tr-header\">";
                    table_head_low+="<th>#</th>";
                    table_head_low+="<th>Start Date</th>";
                    table_head_low+="<th>End Date</th>";
                    table_head_low+="<th><a href=\"javascript:void(0);\" style=\"font-size:18px;\" id=\"addPeriodForLow\" title=\"Add More Seasons\"><span class=\"fa fa-plus\"></span></a></th></tr>";
                           
                        var rows_low = "";
                        var low_months=[];
                        
                        if(seasons.low.length!=0){
                           
                           $.each(seasons.low, function(i, p) {

                                  low_months=loadCalender(low_months,p.start_date,p.end_date);
                                  start_date_ = p.start_date.split("-");

                                   start_date = start_date_[1] + "/" + start_date_[2] + "/" + start_date_[0];

                                   end_date_ = p.end_date.split("-");

                                   end_date = end_date_[1] + "/" + end_date_[2] + "/" + end_date_[0];

                                   if(p.start_date=="0000-00-00"){

                                      start_date="";
                                    }
                                    if(p.end_date=="0000-00-00"){

                                      end_date="";
                                    }
                                  counter= i+1;
                                  rows_low+="</tr>";
                                  rows_low+="<tr style=\"background-color:#fafafa\">";
                                  rows_low+="<td>";
                                  rows_low+="<label>"+counter+"</label>";
                                  rows_low+="</td>";
                                  rows_low+="<td><input id=\""+p.id+"\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" placeholder=\"start date\"  value=\""+ start_date+"\" class=\"datepicker form-control low\"></td>";

                                  rows_low+="<td><input id=\""+p.id+"\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" name=\"end_date\" value=\""+ end_date+"\" class=\"datepicker form-control low\"></td>";

                                  rows_low+="<td><a id=\""+p.id+"\" href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                  rows_low+="</tr>";

                            });
                             
                            
                            //alert(JSON.stringify(low_months));
                             populateCalender(low_months,"low_months","tag-after-low");

                        }else{
                                  populateCalender(low_months,"low_months","tag-after-low");
                                  counter= 1;
                                  rows_low+="</tr>";
                                  rows_low+="<tr style=\"background-color:#fafafa\">";
                                  rows_low+="<td>";
                                  rows_low+="<label>"+counter+"</label>";
                                  rows_low+="</td>";
                                  rows_low+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" placeholder=\"start date\" class=\"datepicker form-control low\"></td>";

                                  rows_low+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" name=\"end_date\" class=\"datepicker form-control low\"></td>";

                                  rows_low+="<td><a href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                  rows_low+="</tr>";


                        }
                            

                        $("#tb_low").html(table_head_low+rows_low);
                        $('#addPeriodForLow').on('click', function() {

                               var current_row =$("#tb_low tr").length-1;

                               var data = $("#tb_low tr:eq("+current_row+")");
                               //alert(data.find("input").attr("id"))

                               if(data.find("input").attr("id")!=0){
                                 var rows_low_="";

                                 counter= parseInt(data.find("label").html()) +1;
                                  rows_low_+="</tr>";
                                  rows_low_+="<tr style=\"background-color:#fafafa\">";
                                  rows_low_+="<td>";
                                  rows_low_+="<label>"+counter+"</label>";
                                  rows_low_+="</td>";
                                  rows_low_+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" name=\"start_date\" placeholder=\"start date\" class=\"datepicker form-control low\"></td>";

                                  rows_low_+="<td><input id=\"0\" type=\"text\" onchange=\"updateStartDate(this)\" placeholder=\"end date\" name=\"end_date\" class=\"datepicker form-control low\"></td>";

                                  rows_low_+="<td><a  href='javascript:void(0);' class='remove'><span class='fa fa-remove'></span></a></td>";
                                 rows_low_+="</tr>";

                                $("#tb_low").append(rows_low_);
                                 startDatePicker();

                               }
                              // data.find("input").val('');
                             });

                        startDatePicker();


    }



    function deleteSeason(e) {
       
                var id=$(e).attr("id");
                $.post("src/delete.php", {
                    token: "seasons_tb",
                    data: id,
                    reference: "id"

                }, function(response) {
                     
                    if(response==="success"){

                      $(e).closest("tr").remove();
                     

                    }

                     getSeasons();
                     
                });


    }
</script>
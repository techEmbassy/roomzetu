<div class="modal animated FadeIn" id="new-booking">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">
                    <i class="btn-circle fa fa-angle-left step-control prev" onclick="gotoStep('prev')" disabled></i>
                    <i class="btn-circle fa fa-angle-right  step-control next" onclick="gotoStep('next')"></i>
                    <small>New Booking</small>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body pt-0 pb-0 steps">
                <div class=" step-item active">
                    <div class="row">
                        <div class="col-md-3 border-right pb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Property</label>
                                    <!--
                                    <select class="form-control">
                   <option>Simba</option>
                   <option>Primate</option>
               </select>
-->
                                    <select class="form-control tiny" id="properties">
                                     <?php echo $propertyOptions;?>
                                </select>

                                </div>
                                <div class="col-md-12">
                                    <label>Room Type</label>
                                    <select class="form-control">
                                      <option>All Room types</option>
                                       <option>Delux</option>
                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label>Check In</label>
                                    <input class="datepicker form-control" placeholder="" />
                                </div>

                                <div class="col-md-12">
                                    <label>Check Out</label>
                                    <input class="datepicker form-control" placeholder="" />
                                </div>

                                <div class="col-md-12">
                                    <label>Room rate</label>
                                    <select class="form-control">
                                     <option>Standard</option>
                                     <option>Complementary</option>
                                     <option>High Season</option>
                                     <option>Low Season</option>
                                     </select>
                                </div>

                                <div class="col-md-12 mt-3">

                                    <button class="btn btn-outline-success btn-sm "><i class="fa fa-refresh fa-spin"></i> Load Rooms</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 p-1 c-body" style="height:70vh; background:#f0f0f0">


                            <table class="table table-bordered table-bookings">
                                <tr>
                                    <!--
                             <td style="width:100px">
                              <img class="img-fluid" src="img/5.jpg"/>
                             </td>
-->
                                    <td>
                                        <div class="container-fluid">
                                            <h5><b>Double Beds Cottage</b></h5>
                                            <p>- 2 beds (king size)</p>
                                            <p>- Wifi</p>
                                            <p>- DSTV</p>
                                            <p>- Bathroom</p>

                                            <br> Max people
                                            <hr class="mt-1 mb-2">
                                            <p>2 Adults , 1 Child</p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Room Rate</label>
                                            <p><select class="form-control"><option>Standard</option></select>
                                                <br><br><span><span class="price">$345</span> per night</span>
                                            </p>
                                            <br><br>
                                            <p class="alert alert-success p-1">Available Rooms : <b>8</b></p>


                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Number of Rooms</label>
                                            <p><select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option></select> </p>
                                            <br>
                                            <p>Total Cost: <br><span class="text-blue"> $3737</span> for 1 room for 2 nights</p>
                                            <br>

                                            <button class="btn btn-primary btn-md" onclick="gotoStep(1)"><i class="fa fa-check-circle"></i> Select</button>
                                        </div>
                                    </td>


                                </tr>

                                <tr>
                                    <!--
                             <td style="width:100px">
                              <img class="img-fluid" src="img/5.jpg"/>
                             </td>
-->
                                    <td>
                                        <div class="container-fluid">
                                            <h5><b>Single Beds Cottage</b></h5>
                                            <p>- 1 bed (king size)</p>
                                            <p>- Wifi</p>
                                            <p>- DSTV</p>
                                            <p>- Bathroom</p>

                                            <br> Max people
                                            <hr class="mt-1 mb-2">
                                            <p>1 Adults , 0 Child</p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Price Rate</label>
                                            <p><select class="form-control"><option>Standard</option></select>
                                                <br><br><span><span class="price">$345</span> per night</span>
                                            </p>
                                            <br><br>
                                            <p class="alert alert-danger p-1">Available Rooms : <b>0</b></p>


                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Number of Rooms</label>
                                            <p><select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option></select> </p>
                                            <br>
                                            <p>Total Cost: <br> <span class="text-blue">$22</span> for 1 room for 2 nights</p>
                                            <br>

                                            <button class="btn btn-primary btn-md" disabled><i class="fa fa-check-circle"></i> Select</button>
                                        </div>
                                    </td>


                                </tr>

                                <tr>
                                    <!--
                             <td style="width:100px">
                              <img class="img-fluid" src="img/5.jpg"/>
                             </td>
-->
                                    <td>
                                        <div class="container-fluid">
                                            <h5><b>Single Beds Cottage</b></h5>
                                            <p>- 1 bed (king size)</p>
                                            <p>- Wifi</p>
                                            <p>- DSTV</p>
                                            <p>- Bathroom</p>
                                            <p>- Bathroom</p>
                                            <p>- Bathroom</p>

                                            <br> Max people
                                            <hr class="mt-1 mb-2">
                                            <p>1 Adults , 0 Child</p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Price Rate</label>
                                            <p><select class="form-control"><option>Standard</option></select>
                                                <br><br><span><span class="price">$345</span> per night</span>
                                            </p>
                                            <br><br>
                                            <p class="alert alert-warning p-1">Available Rooms : <b>1</b></p>


                                        </div>
                                    </td>

                                    <td>
                                        <div class="container-fluid">
                                            <label>Number of Rooms</label>
                                            <p><select class="form-control"><option>1</option><option>2</option><option>3</option><option>4</option></select> </p>
                                            <br>
                                            <p>Total Cost: <br><span class="text-blue">$4290</span> for 1 room for 2 nights</p>
                                            <br>

                                            <button class="btn btn-primary btn-md" onclick="gotoStep(1)"><i class="fa fa-check-circle"></i> Select</button>
                                        </div>
                                    </td>


                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="step-item">
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <label>Booking Source:</label>
                            <select class="form-control">
                         <option value="1">Direct Booking</option>
                         <option value="1">Agent</option>
                         <option value="1">Walk in</option>
                        </select>
                        </div>

                        <div class="col-md-2">
                            <label>Select Agent:</label>
                            <select class="form-control">
                         <option value="1">Wildplaces</option>
                         <option value="1">Lion King</option>
                         <option value="1">John</option>
                        </select>

                        </div>
                        <div class="col-md-2 border-right">
                            <label>or</label>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-add"></i>Add New Agent</a>

                                <div class="dropdown-menu" id="agent-info pt-2">
                                    <div class="p-3" style="width:250px;">

                                        <label>Agent/Company Name</label>
                                        <input class="form-control" style="text-transform: capitalize;" />

                                        <label>Email</label>
                                        <input class="form-control" type="email" data-input='email' data-invalid-message='invalid email' />
                                        <label>Phone</label>
                                        <input class="form-control" type="number" />

                                        <label>Country</label>
                                        <input class="form-control" />

                                        <label>Address</label>
                                        <input class="form-control" style="text-transform: capitalize;" />

                                        <button class="btn btn-primary btn-sm mt-2">Save Agent</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 pt-2">
                            <hr/>
                            <h5>Guest(s) Info</h5>
                            <p><input value="1" id='num-guests' type="number" class="form-control tiny" style="width:60px" min='1' />
                                <button class="btn btn-sm btn-secondary">Add Guests</button></p>
                            <br/>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width:60px">Age</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Passport/Id Number</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input value="Jone doe" /></td>
                                        <td><input value="28" /></td>
                                        <td><input value="jd@gmail.com" /></td>
                                        <td><input value="+281998289" /></td>
                                        <td><input value="839920029" /></td>
                                    </tr>


                                </tbody>
                            </table>
                            <br>
                            <br>
                            <a class="btn btn-primary btn-md next hide" onclick="gotoStep(2)">Next</a>

                        </div>
                    </div>
                </div>


                <div class="step-item">
                    <div class="row">
                        <div class="col-md-8 p-3 scrolly" style="height:70vh">
                            <p><b>Extras & Services</b></p>
                            <table class="table table-bordered ">
                                <tr>
                                    <th></th>
                                    <th>Adon</th>
                                    <th>Price per guest</th>
                                    <th>Number of guests</th>
                                    <th>Total Cost</th>
                                </tr>
                                <tr>
                                    <td style="width:30px" class="checkbox">
                                        <input type="checkbox" class="" />
                                    </td>
                                    <td>1 day Forest walk</td>
                                    <td><select class="form-control"><option>$23</option><option>free</option></select></td>
                                    <td><select class="form-control"><option>1</option><option>2</option></select></td>
                                    <td>$0</td>

                                </tr>
                                <tr>
                                    <td style="width:30px">
                                        <input type="checkbox" class="form-control" />
                                    </td>
                                    <td>1 day Forest walk</td>
                                    <td><select class="form-control"><option>$23</option><option>free</option></select></td>
                                    <td><select class="form-control"><option>1</option><option>2</option></select></td>
                                    <td>$24</td>

                                </tr>
                                <tr>
                                    <td style="width:30px">
                                        <input type="checkbox" class="form-control" />
                                    </td>
                                    <td>1 day Forest walk</td>
                                    <td><select class="form-control"><option>$23</option><option>free</option></select></td>
                                    <td><select class="form-control"><option>1</option><option>2</option></select></td>
                                    <td>$24</td>

                                </tr>
                                <tr>
                                    <td style="width:30px">
                                        <input type="checkbox" class="form-control" />
                                    </td>
                                    <td>1 day Forest walk</td>
                                    <td><select class="form-control"><option>$23</option><option>free</option></select></td>
                                    <td><select class="form-control"><option>1</option><option>2</option></select></td>
                                    <td>$24</td>

                                </tr>

                            </table>
                        </div>

                        <div class="col-md-4">
                            <h5 class="mt-3"><small>Booking Summary</small></h5>
                            <table class="table table-bordered table-summary">
                                <tr>
                                    <td>Check In</td>
                                    <td>2 June 2017</td>
                                    <td rowspan="2" class="valign-middle text-center">2 <br> Nights</td>
                                </tr>

                                <tr>
                                    <td>Check Out</td>
                                    <td>2 June 2017</td>
                                </tr>

                                <tr>
                                    <td>Guests</td>
                                    <td colspan="2">peter florrick + 1 other</td>
                                </tr>

                                <tr>
                                    <td>Rooms</td>
                                    <td colspan="2">Double bed..(1)</td>
                                </tr>

                                <tr>
                                    <td>Source</td>
                                    <td colspan="2">Wild Places</td>
                                </tr>
                            </table>
                            <label>Cost of extras & Services: 
                        </label><br>
                            <h6>$234</h6>


                            <label>Cost of room(s) for 2 nights: 
                        </label><br>
                            <h6>$404</h6>

                            <label><b>Total cost</b>: 
                        </label><br>
                            <h5 class="price">$624</h5>
                            <a class="btn btn-primary btn-md next hide" onclick="gotoStep(3)">Next</a>
                        </div>
                    </div>
                </div>

                <!--
                <div class="step-item">
                    <div class="row">
                        <div class="col-md-8 p-3">

                            <table class="table table-bordered ">
                                
                            </table>
                        </div>

                        <div class="col-md-4">
                            
                            <a class="btn btn-primary btn-md next hide" onclick="gotoStep(3)">Next</a>
                        </div>
                    </div>
                </div>
-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left " style="" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary hide btn-next" onclick="clickNext()">Next <i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<style>
    .steps {
        height: 70vh;
        width: 96%;
        margin: auto;
        position: relative;
    }

    .steps .step-item {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: none;
    }

    .steps .step-item.active {
        display: block;
    }

</style>

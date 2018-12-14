<?php include 'includes/auth.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Roomzetu | Hotel Management System</title>
     <?php include 'includes/styles.php'?>
</head>

<body class="gray">
   <?php  $mpos = 4; include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-2 pr-0">

                    <p><small>Manage connections, agents and previous guests</small> </p>
                    <hr/>
                    <div class="sub-menu ">
                        <a href="">Agents List</a>
                        <a href="" class="active">Guest List</a>
                    </div>
                    <div class="foot pt-4 pl-2 text-left">
<!--                             <a class="btn btn-sm btn-secondary"><i class="fa fa-plus"></i> New Room type</a>-->

                        </div>

                </div>

                <div class="col-md-10 mt-2">
                    <div class="card p-0">
                        <div class="header p-3">
                            <div class="row">
                                <div class="col-md-3">
                                   Agents List
                                </div>

                                <div class="col-md-9 text-right">
<!--                                    <a class="btn btn-secondary btn-sm" href="" data-target="#new-px" data-toggle="modal"><i class="fa fa-plus"></i> New room type</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="c-body p-3">
                            <table class="table table-bordered table-primary mt-0 table-hover">
                                <thead>
                                    <tr onclick="showDetails()">
                                        <th style="width:5px; padding:0"></th>
                                        <th>Name <i class="fa fa-angle-down"></i> </th>

                                        <th>checkin</th>
                                        <th>check out</th>
                                        <th>Nights</th>
                                        <th>people</th>
                                        <th>Booked on </th>
                                        <th>Room</th>
                                        <th>Total Cost</th>
                                        <th>Deposit</th>
                                        <th>Bal</th>
                                        <th>Source</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr onclick="showDetails()">
                                        <td class="stat"><i class="fa fa-circle text-green"></i></td>
                                        <td>John doe</td>
                                        <td>2/May/2014</td>
                                        <td>2/May/2014</td>
                                        <td>2</td>
                                        <td>1A & 2K</td>
                                        <td>2/May/2014</td>
                                        <td>Double..(1)</td>
                                        <td>$320</td>
                                        <td>$0</td>
                                        <td>$320</td>
                                        <td>Walk in </td>
                                    </tr>
                                    <tr onclick="showDetails()">
                                        <td class="stat"><i class="fa fa-circle text-red"></i></td>
                                        <td>John doe</td>
                                        <td> 2/May/2014</td>
                                        <td> 2/May/2014</td>
                                        <td>2</td>
                                        <td>1A & 2K</td>
                                        <td>2/May/2014</td>
                                        <td>Double..(1)</td>
                                        <td>$320</td>
                                        <td>$0</td>
                                        <td>$320</td>
                                        <td>Walk in </td>
                                    </tr>
                                    <tr>
                                        <td class="stat"><i class="fa fa-circle text-gray"></i></td>
                                        <td>John doe</td>
                                        <td>2/May/2014</td>
                                        <td>2/May/2014</td>
                                        <td>2</td>
                                        <td>1A & 2K</td>
                                        <td>2/May/2014</td>
                                        <td>Double..(1)</td>
                                        <td>$320</td>
                                        <td>$0</td>
                                        <td>$320</td>
                                        <td>Wild Places </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<div class="modal animated bounceInDown" id="new-px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">New Room Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Property</label>
                        <select class="form-control">
                   <option>Simba</option>
                   <option>Primate</option>
               </select>

                    </div>

                    <div class="col-md-12">
                        <label>Room type name</label>
                        <input class="form-control" placeholder="e.g Delux Single Bed" />
                    </div>
                    <div class="col-md-12">
                        <label>Price per night <small>(Standard Price)</small></label>
                        <div class="input-group">
                            <span class="input-group-addon"><b>$</b></span>
                            <input class="form-control" placeholder="" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>Number of beds</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>Bed size(s)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" placeholder="size e.g king size" />
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="dimensions e.g. 6x6" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Room type</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

 <?php include 'includes/footer.php'?>
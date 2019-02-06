<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{url('images/favicon.jpg')}}" type="image/ico" />
        <title>War Room</title>
        <!-- Bootstrap {{url('')}}-->
        <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{url('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="{{url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{{url('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="{{url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- Selectize -->
        <!--<link href="vendors/selectize.js-master/dist/css/selectize.css" rel="stylesheet">-->
        <link href="{{url('vendors/selectize.js-master/dist/css/selectize.default.css')}}" rel="stylesheet">
        <!-- Datatables -->
        <link href="{{url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <!-- Custom Theme Style -->
        <link href="{{url('css/custom.min.css')}}" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed">
                    <div class="left_col scroll-view">
                        <div style="margin-top: 10px;" class="navbar nav_title" style="border: 0;">
                            <a href="{{ url('/dashboard') }}" class="site_title"> <img  style="width: 80%;" rel="icon" src="{{url('images/logo__white1.png')}}" type="image/ico" /> <br></a>
                            <div style="padding-bottom: 4px;text-align: center">
                            <span style="font-size: 15px; width: 80%;padding-bottom: 4px; ">SDF WAR ROOM</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
<!--                            <div class="profile_pic">
                                <img src="{{url('images/0.jpg')}}" alt="..." class="img-circle profile_img">
                            </div>-->
                            <div class="profile_info text-left">
                                <span><strong>Welcome,</strong></span>
                                <h2><strong>{{ Auth::user()->name }}</strong></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <hr>

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <!--<h3>General</h3>-->
                                <ul class="nav side-menu">

                                    <?php  if (config('constants.roles.administrator') == Auth::user()->role_id) { ?>
                                    <li><a><i class="fa fa-cogs"></i> System <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/eventLog') }}"><i class="fa fa-cog"></i> Event Logs</a></li>
                                            <li><a href="{{ url('/lines') }}"><i class="fa fa-phone"></i> Lines Configuration</a></li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                        <?php  if (config('constants.roles.callagent') != Auth::user()->role_id) { ?>
                                        <li><a><i class="fa fa-dashboard"></i> Dashboards <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/dashboard') }}" ><i class="fa fa-cubes"></i> Product Revenue </a></li>
                                            <li><a href="{{ url('/dashboardinprg') }}" ><i class="fa fa-line-chart"></i> In Progress Run </a></li>
                                            <!--
                                            <li><a href="{{ url('/dashboardtopagents') }}" ><i class="fa fa-users"></i> Top Agents </a></li>
                                            -->
                                        </ul>
                                    </li>
                                        <?php } ?>
                                        <?php  if ((config('constants.roles.administrator') == Auth::user()->role_id) || (config('constants.roles.branchmanager') == Auth::user()->role_id)) { ?>
                                    <li><a><i class="fa fa-user"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/manageUsers') }}">Users</a></li>
                                            <li><a href="{{ url('/manageBranches') }}">Branches</a></li>
                                        </ul>
                                    </li>
                                        <?php } ?>
                                        <?php  if ((config('constants.roles.administrator') == Auth::user()->role_id) ) { ?>
                                    <li><a><i class="fa fa-product-hunt"></i> Manage Campaigns <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/manageProduct') }}">Products</a></li>
                                            <li><a href="{{ url('/manageCampaign') }}">Campaigns</a></li>
                                        </ul>
                                    </li>
                                        <?php } ?>

                                    <li><a><i class="fa fa-newspaper-o"></i> Manage Leads <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/leadsAdd') }}">Add New Leads</a></li>
                                            <?php  if ((config('constants.roles.administrator') == Auth::user()->role_id) || (config('constants.roles.branchmanager') == Auth::user()->role_id)) { ?>
                                            <li><a href="{{ url('/allLeads') }}">All  Leads</a></li>
                                            <?php } ?>
                                            <?php  if ((config('constants.roles.administrator') == Auth::user()->role_id) || (config('constants.roles.branchmanager') == Auth::user()->role_id) ||(config('constants.roles.branchagent') == Auth::user()->role_id)) { ?>


                                            <?php  if ((config('constants.roles.administrator') == Auth::user()->role_id) || (config('constants.roles.branchmanager') == Auth::user()->role_id)) { ?>
                                            <li><a href="{{ url('/unassignedLeads') }}">Unassigned Leads</a></li>
                                            <?php } ?>
                                                                                       
                                            <li><a href="{{ url('/leadsNew') }}">New Leads</a></li>
                                            <li><a href="{{ url('/leadsInprogress') }}">Conversion In-Progress</a></li>
                                            <li><a href="{{ url('/leadsPositive') }}">Positive Leads</a></li>
                                            <li><a href="{{ url('/leadsProcessed') }}">Conversion Completed</a></li>                                            
                                            <li><a href="{{ url('/leadsNegative') }}">Negative Leads</a></li>
                                            <?php } ?>

                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-file"></i> Reports <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ url('/reportGenerate') }}">Generate</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>

                        </div>

                        <!-- /sidebar menu -->
                        <!-- /menu footer buttons  -->
<!--                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFull()">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>-->
                        <!-- /menu footer buttons -->

                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i style="margin: 0 5px" class="fa fa-user"></i>{{ Auth::user()->name }}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="{{ route('changePassword')}}">Change Password</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <!-- /top navigation -->
                <div class="right_col" role="main">
                    <!-- page content -->
                    
                    
                <div class="row">
                    <div id="alertSuccess" name="alertSuccess" class="alert alert-success alert-dismissible text-center"  style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>SUCCESS!</strong>
                      </div>
                     <div id="alertWarning" name="alertWarning" class="alert alert-warning alert-dismissible text-center" style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                         <strong>Warning!</strong> <span id="alertWarningMessage"></span>
                      </div>
                      <div id="alertError" name="alertError" class="alert alert-danger alert-dismissible text-center" style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                          <strong>Error!</strong> <span id="alertErrorMessage"></span>
                      </div>
                  </div>
                     
                    @yield('content')        

                    <!-- /page content -->
                </div>
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Created by <a href="http://www.enfection.com/">ENFECTION</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>



        <div id ="incomminglead">

        </div>


        <!-- jQuery --> 
        <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{url('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{url('vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{url('vendors/nprogress/nprogress.js')}}"></script>
        <!-- Chart.js -->
        <script src="{{url('vendors/Chart.js/dist/Chart.min.js')}}"></script>
        <!-- gauge.js -->
        <script src="{{url('vendors/gauge.js/dist/gauge.min.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{url('vendors/iCheck/icheck.min.js')}}"></script>
        <!-- Skycons -->
        <script src="{{url('vendors/skycons/skycons.js')}}"></script>
        <!-- Flot -->
        <script src="{{url('vendors/Flot/jquery.flot.js')}}"></script>
        <script src="{{url('vendors/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{url('vendors/Flot/jquery.flot.time.js')}}"></script>
        <script src="{{url('vendors/Flot/jquery.flot.stack.js')}}"></script>
        <script src="{{url('vendors/Flot/jquery.flot.resize.js')}}"></script>
        <!-- Flot plugins -->
        <script src="{{url('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
        <script src="{{url('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
        <script src="{{url('vendors/flot.curvedlines/curvedLines.js')}}"></script>
        <!-- DateJS -->
        <script src="{{url('vendors/DateJS/build/date.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{url('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
        <script src="{{url('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <!-- Parsley -->
        <script src="{{url('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

        <!-- Selectize -->
        <script src="{{url('vendors/selectize.js-master/dist/js/standalone/selectize.min.js')}}"></script>

        <!-- Datatables -->

        <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
        <script src="{{url('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
        <script src="{{url('vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{url('vendors/pdfmake/build/vfs_fonts.js')}}"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <script src="{{url('js/custom.min.js')}}"></script>
    </body>
</html>

<script>
    if(window.Worker){
        var role_id = <?php echo \Illuminate\Support\Facades\Auth::user()->role_id;?>;
        var aget_role_id = <?php echo config('constants.roles.callagent');?>;
        if(role_id == aget_role_id){
            setInterval(function(){
                $.ajax({
                    url: "{{url('lead/getIncommingLead')}}",
                    type: 'get',
                    success: function (respond) {
                        if(respond == "noleads"){
                            console.log("nooo");
                        }else {
                           // window.location.href ="http://localhost/warr/public/incomminglead";


                            $('#incomminglead').html(respond.template);
                           
                            $('#incomming_call_model').modal('show');
                            console.log(respond.incomingCallid);
                            if(respond.incomingCallid){
                                updateSeen(respond.incomingCallid);
                            }

                        }

                    },
                    complete: function (respond) {
                    //  console.log(respond);
                    }
                });
            }, 5000);
        }
    }

    function updateSeen(id) {
           console.log('in function');
        $.ajax({
            url: "{{url('lead/updateseen')}}",
            type: 'get',
            data:{id:id},
            success: function (respond) {

                console.log(respond);
            },
            complete: function (respond) {
                //  console.log(respond);
            }
        });

    }


</script>
<script>

        $(document).ready(function () {

            init_DataTables();
            function init_DataTables() {
                if (typeof ($.fn.DataTable) === 'undefined') {
                    return;
                }
                var handleDataTableButtons = function () {
                    if ($("#jstable").length) {
                        $("#jstable").DataTable({
                            dom: "Blfrtip",
                            keys: true,
                            buttons: [
                                {
                                    extend: "copy",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "csv",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "excel",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "pdfHtml5",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "print",
                                    className: "btn-sm"
                                },
                            ],
                            responsive: true
                        });
                    }

                };


                TableManageButtons = function () {
                    "use strict";
                    return {
                        init: function () {
                            handleDataTableButtons();
                        }
                    };
                }();
                TableManageButtons.init();
            };

            if($('#formusercreate').length){
                refreshUsers();
            }

            function refreshUsers(){
                var data = $('#formusercreate').serialize();

                $.ajax({
                    url: "{{url('/user/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshUsers').html(respond);
                    },
                    complete: function () {

                    }
                });
            }

            $('#formusercreate').submit(function (e) {
                e.preventDefault();
                var data = $('#formusercreate').serialize();
                $.ajax({
                    url: "{{url('user/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {

                        if (respond.success) {
                            alertMessage(1);
                            refreshUsers();
                            $('#formusercreate').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });






            
            if($('#formaddbranch').length){
                refreshBranches();
            }

            function refreshBranches(){
                var data = $('#formaddbranch').serialize();

                $.ajax({
                    url: "{{url('/branch/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshBranches').html(respond);
                    },
                    complete: function () {

                    }
                });
            }

            $('#formaddbranch').submit(function (e) {
                e.preventDefault();
                var data = $('#formaddbranch').serialize();
                $.ajax({
                    url: "{{url('branch/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                        if (respond.success) {
                            alertMessage(1);
                            refreshBranches();
                            $('#formaddbranch').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                            
                        }
                    },
                    complete: function () {

                    }
                });
            });

            $('#formupdatebranch').submit(function (e) {
                e.preventDefault();
                var data = $('#formupdatebranch').serialize();
                $.ajax({
                    url: "{{url('branch/update')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                        if (respond.success) {
                            alertMessage(1);
                            //refreshBranches();
                            $('#formupdatebranch').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                        }
                        console.log(respond);
                    },
                    complete: function () {

                    }
                });
            });

            if($('#formaddproduct').length){
                refreshProducts();
            }

            function refreshProducts(){
                var data = $('#formaddproduct').serialize();

                $.ajax({
                    url: "{{url('/product/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshProducts').html(respond);
                    },
                    complete: function () {

                    }
                });
            }

            $('#formaddproduct').submit(function (e) {
                e.preventDefault();
                var data = $('#formaddproduct').serialize();
                $.ajax({
                    url: "{{url('product/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                        if (respond.success) {
                            alertMessage(1);
                            refreshProducts();
                             $('#formaddproduct').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                           
                        }
                    },
                    complete: function () {

                    }
                });
            });


            if($('#formcampcreate').length){
                refreshCampaigns();
            }

            function refreshCampaigns(){
                var data = $('#formcampcreate').serialize();

                $.ajax({
                    url: "{{url('/campaign/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshcamps').html(respond);
                    },
                    complete: function () {

                    }
                });
            }

            $('#formcampcreate').submit(function (e) {
                e.preventDefault();
                var data = $('#formcampcreate').serialize();
                $.ajax({
                    url: "{{url('campaign/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                       
                        if (respond.success) {
                            alertMessage(1);
                            refreshCampaigns();
                             $('#formcampcreate').get(0).reset();
                        } else {
                           alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });

           
           if ($("#formaddleads").length) {
                refreshFreshLeads();
            }
           
           function refreshFreshLeads(){
                  var data = $('#formaddleads').serialize();
                  console.log(data);

                $.ajax({
                    url: "{{url('/lead/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {

                        $('#leads').html(respond);
                    },
                    complete: function () {

                    }
                });
           }

            $('#formaddleads').submit(function (e) {

                e.preventDefault();
                console.log('in');
                var data = $('#formaddleads').serialize();
                console.log(data);
                $.ajax({
                    url: "{{url('lead/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                      
                        if (respond.success) {
                            refreshFreshLeads();
                            alertMessage(1);
                            $('#formaddleads').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });

            $('#formbulkaddleads').submit(function (e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('selbulkbranch', $('#selbulkbranch').val());
                formData.append('selbulkcampaign', $('#selbulkcampaign').val());
                formData.append('_token', $('#_token').val());
                formData.append('fileexcel', $('#fileexcel').prop('files')[0]);

                $.ajax({
                    url: "{{url('lead/bulkCreate')}}",
                    type: 'post',
                    async: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (respond) {
                     
                        if (respond.success) {
                            refreshFreshLeads();
                            alertMessage(1);
                            $('#formbulkaddleads').get(0).reset();
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });
            
            
            $('#frmrefreshlog').submit(function (e) {
                e.preventDefault();
                refreshLog();
            });
            
            if ($("#logToken").length) {
                refreshLog();
            }

            function refreshLog() {
                var data = $('#logToken').serialize();
              //  console.log(data);
                $.ajax({
                    url: "{{url('/eventlog/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshLog').html(respond);
                    },
                    complete: function () {

                    }
                });
            }
                       
            $('#frmcreateline').submit(function (e) {
                e.preventDefault();
                
                var data = $('#frmcreateline').serialize();
                $.ajax({
                    url: "{{url('/lines/create')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                         if (respond.success) {
                             refreshLine();
                            alertMessage(1);
                            $('#frmcreateline').get(0).reset();
                        } else {
                            alertMessage(2, respond.error.number);
                        }
                    },
                    complete: function () {

                    }
                });
            });
            
            if ($("#lineToken").length) {
                refreshLine();
            }

            function refreshLine() {
                var data = $('#lineToken').serialize();
                $.ajax({
                    url: "{{url('/lines/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        $('#refreshLines').html(respond);
                    },
                    complete: function () {
                    }
                });
            }


            if ($("#dashToken").length) {
                refreshBoard();
            }

            function refreshBoard() {
                var data = $('#dashToken').serialize();

                $.ajax({
                    url: "{{url('/dashboard/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                         if (respond.success) {
                            $('#dashItems').html(respond.data);
                        } else {

                        }
                       
                    },
                    complete: function () {
                         var myVar = setTimeout(function(){ refreshBoard(); clearTimeout(myVar); }, 20000);
                    }
                });
            }
            
            
            if ($("#dashTokenTopSellers").length) {
                refreshSellerBoard();
            }

            function refreshSellerBoard() {
                var data = $('#dashTokenTopSellers').serialize();

                $.ajax({
                    url: "{{url('/dashboardtopagents/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                         if (respond.success) {
                            $('#dashTopSellers').html(respond.data);
                        } else {

                        }
                    },
                    complete: function () {
                        var myVar = setTimeout(function(){ refreshSellerBoard(); clearTimeout(myVar); }, 20000);
                    }
                });
            }
            
            
            if ($("#dashTokenInProgress").length) {
                refreshInProgressBoard();
            }

            function refreshInProgressBoard() {
                var data = $('#dashTokenInProgress').serialize();

                $.ajax({
                    url: "{{url('/dashboardinprg/refresh')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                         if (respond.success) {
                            $('#dashItemsInProgress').html(respond.data);
                        } else {

                        }
                    },
                    complete: function () {
                         var myVar = setTimeout(function(){ refreshInProgressBoard(); clearTimeout(myVar); }, 20000);
                    }
                });
            }
            
            
            $('#formuserupdate').submit(function (e) {
                e.preventDefault();
                var data = $('#formuserupdate').serialize();
                $.ajax({
                    url: "{{url('user/update')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {

                        if (respond.success) {
                            alertMessage(1);
                          //  location.reload();
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });
            
            $('#formeditproduct').submit(function (e) {
                e.preventDefault();
                var data = $('#formeditproduct').serialize();
                $.ajax({
                    url: "{{url('product/update')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                       
                        if (respond.success) {
                            alertMessage(1);
                          //  location.reload();
                        } else {
                            alertMessage(2, respond.error);
                            //console.log(respond.errors);
                        }
                    },
                    complete: function () {

                    }
                });
            });
            
            $('#formcampedit').submit(function (e) {
                e.preventDefault();
                var data = $('#formcampedit').serialize();
                $.ajax({
                    url: "{{url('campaign/edit')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                      
                        if (respond.success) {
                            alertMessage(1);
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });

            $('#formsetleads').submit(function (e) {
                e.preventDefault();
                var data = $('#formsetleads').serialize();
                $.ajax({
                    url: "{{url('/lead/setBranch')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        if (respond.success) {
                            
                           alertMessage(1);
                           setTimeout( redirect, 2000);
                           function redirect(){
                                window.location = "{{url('leadsOrphaned')}}";
                           }
                            
                        } else {
                            alertMessage(2, respond.error);
                        }
                    },
                    complete: function () {

                    }
                });
            });

            $('#formaddfollowup').submit(function (e) {
                e.preventDefault();
                var data = $('#formaddfollowup').serialize();
                $.ajax({
                    url: "{{url('/lead/followup')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        
                        if (respond.success) {
                            alertMessage(1);
                            setTimeout( reload, 2000);
                           function reload(){
                                location.reload();
                           }
                        } else {
                            alertMessage(2, respond.error);
                           // console.log(respond.errors);
                        }
                    },
                    complete: function () {

                    }
                });
            });
            
            $('#formreport').submit(function (e) {
                e.preventDefault();
                var data = $('#formreport').serialize();
                // console.log(data);
                $.ajax({
                    url: "{{url('/report/generate')}}",
                    type: 'post',
                    data: data,
                    success: function (respond) {
                        alertMessage(1);
                        $('#testdata').html(respond);
                    },
                    complete: function () {

                    }
                });
            });


        });




        
//        function cancelFullScreen(el) {
//            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
//            if (requestMethod) { // cancel full screen.
//                requestMethod.call(el);
//            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
//                var wscript = new ActiveXObject("WScript.Shell");
//                if (wscript !== null) {
//                    wscript.SendKeys("{F11}");
//                }
//            }
//        }
//
//        function requestFullScreen(el) {
//            // Supports most browsers and their versions.
//            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;
//
//            if (requestMethod) { // Native full screen.
//                requestMethod.call(el);
//            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
//                var wscript = new ActiveXObject("WScript.Shell");
//                if (wscript !== null) {
//                    wscript.SendKeys("{F11}");
//                }
//            }
//            return false
//        }
//
//        function toggleFull() {
//            var elem = document.body; // Make the body go full screen.
//            var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
//
//            if (isInFullScreen) {
//                cancelFullScreen(document);
//            } else {
//                requestFullScreen(elem);
//            }
//            return false;
//        }
        
        // success - 1
        // warning - 2 
        // error - 3
       function alertMessage(type , message = "", sustainPeriod = 1000){

           switch(type){
               case 1:
                    $('#alertSuccess').fadeIn(sustainPeriod,function(){});
                    $('#alertSuccess').fadeOut(sustainPeriod,function(){});
                   break;
               case 2:
                   $('#alertWarningMessage').text(message);
                    $('#alertWarning').fadeIn(sustainPeriod,function(){});
                   break;
               case 2:
                     $('#alertErrorMessage').text(message);
                    $('#alertError').fadeIn(sustainPeriod,function(){});
                   break;
           }               

       }


        ////////////////////////// Start - Report Section //////////////////////////

        $('#frmgrpEmployee').css('display', 'none');
        $('#frmgrpProducts').css('display', 'none');
        $('#frmgrpCampaign').css('display', 'none');
        $('#frmgrpDateSel').css('display', 'none');
        $('#frmgrpBranches').css('display', 'none');

    function setDateControlState(control) {
        if (control.checked) {
            $('#reservation').prop('disabled', true);
            $('#checkall').prop('value', 1);
        } else {
            $('#reservation').prop('disabled', false);
            $('#checkall').prop('value', 0);
        }
    }

    function setControlsForReport(control) {
        var value = control.value;
        switch (value) {
            case '0': // Selected option Zero
                $('#frmgrpEmployee').css('display', 'none');
                $('#frmgrpProducts').css('display', 'none');
                $('#frmgrpCampaign').css('display', 'none');
                $('#frmgrpDateSel').css('display', 'none');
                $('#frmgrpBranches').css('display', 'none');
                break;
            case '1': // Revenue by Products
                $('#frmgrpEmployee').css('display', 'none');
                $('#frmgrpProducts').css('display', 'block');
                $('#frmgrpCampaign').css('display', 'none');
                $('#frmgrpDateSel').css('display', 'block');
                $('#frmgrpBranches').css('display', 'none');
                break;
            case '2': // Revenue by Campaigns
                $('#frmgrpEmployee').css('display', 'none');
                $('#frmgrpProducts').css('display', 'none');
                $('#frmgrpCampaign').css('display', 'block');
                $('#frmgrpDateSel').css('display', 'block');
                $('#frmgrpBranches').css('display', 'none');
                break;
            case '3': // Progress By Employee
                $('#frmgrpEmployee').css('display', 'none');
                $('#frmgrpProducts').css('display', 'none');
                $('#frmgrpCampaign').css('display', 'none');
                $('#frmgrpDateSel').css('display', 'block');
                $('#frmgrpBranches').css('display', 'block');
                break;
            default:
                break
        }
    }
    /////////////////////////// End - Report Section ///////////////////////////

    // //////////////////////////////Selectize///////////////////////////////////////
    var $wrapper = $('#wrapper');
    var branches = getCities();
    $('#select-tools').selectize({
        maxItems: null,
        valueField: 'id',
        labelField: 'title',
        searchField: 'title',
        options: branches,
        create: false
    });
    /*
     var $select = $('#select-tools').selectize();
     var selectize = $select[0].selectize;
     var defaultId = [1,2,3];
     selectize.setValue(defaultId);
     */
    $(function () {
        var $wrapper = $('#wrapper');

        // display scripts on the page
        $('script', $wrapper).each(function () {
            var code = this.text;
            if (code && code.length) {
                var lines = code.split('\n');
                var indent = null;

                for (var i = 0; i < lines.length; i++) {
                    if (/^[	 ]*$/.test(lines[i]))
                        continue;
                    if (!indent) {
                        var lineindent = lines[i].match(/^([ 	]+)/);
                        if (!lineindent)
                            break;
                        indent = lineindent[1];
                    }
                    lines[i] = lines[i].replace(new RegExp('^' + indent), '');
                }

                var code = $.trim(lines.join('\n')).replace(/	/g, '    ');
                var $pre = $('<pre>').addClass('js').text(code);
                $pre.insertAfter(this);
            }
        });

        // show current input values
        $('select.selectized,input.selectized', $wrapper).each(function () {
            var hiddenInput = $('<input>').prop('type', 'hidden').prop('name', 'covercities').prop('id', 'covercities');
            var $input = $(this);
            var update = function (e) {
                hiddenInput.val((JSON.stringify($input.val())));
            }
            $(this).on('change', update);
            update();
            hiddenInput.insertAfter($input);
        });
    });

    function getCities() {
        var formData = $('#logout-form').serialize();
        var data = [];
        $.ajax({
            url: "{{url('/branch/cities')}}",
            type: 'post',
            async: false,
            cache: false,
            data: formData,
            success: function (respond) {
                if (respond.success) {
                    var retData = respond.data;
                    for (var i = 0; i < retData.length; i++) {
                        data.push({id: retData[i]['id'], title: retData[i]['name']});
                    }
                } else {
                }
            },
            complete: function () {
            }
        });
        return data;
    }

</script>



@yield('scripts')  
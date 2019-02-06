@extends('layouts.admin')

@section('content')

<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Set Branches <small>Add or set new or existing branches.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formaddbranch" name="formaddbranch" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Branch Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtbranchname" name="txtbranchname" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Branch Location <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required class="form-control" id="selcity" name="selcity">
                            <option value="" id="0">-- Select An Option --</option>
                            <?php
                            if (count($data['cities']) > 0) {
                                foreach ($data['cities'] as $city) {
                                    ?>                            
                                    <option value="<?php echo $city->id ?>" id="<?php echo $city->id ?>"><?php echo $city->name ?></option>                            
                                    <?php
                                }
                            }
                            ?>   
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Covered Cities <span class="required">*</span>
                    </label>
                    <div id="wrapper" class="col-md-6 col-sm-6 col-xs-12">
                        <select id="select-tools">
                            <!--<option value="1" selected="selected">ABANPOLA</option>-->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"></label>
                    <div id="wrapper" class="col-md-6 col-sm-6 col-xs-12">
                        <button class="btn btn-group-sm" type="button" data-toggle="modal" data-target="#myModal">Add a city</button>
                    </div>
                </div>
                <div class="demo">
                    <div class="control-group">

                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div>

<div id="refreshBranches" name="refreshBranches">
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add a City</h4>
            </div> 
            <form name="frmSaveCity" id="frmSaveCity" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" id="name" name="name" required="required" placeholder="Please type a name" maxlength="30" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div> 
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

        </div>
    </div>
</div>
    
@endsection



@section('scripts')

<script>

    $(document).ready(function () {
        $("#frmSaveCity").submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: "{{url('city/create')}}",
                type: 'post',
                data: data,
                success: function (respond) {
                    if (respond.success) {
                        alertMessage(1);
                        location.reload();
                    } else {
                        alertMessage(2, respond.errors['name']);
                    }
                },
                complete: function () {
                }
            });

        });
    });



</script>


@endsection


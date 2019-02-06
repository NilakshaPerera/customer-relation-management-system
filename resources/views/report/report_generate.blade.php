@extends('layouts.admin')

@section('content')

<!-- Content here -->

<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Report Generator <small>Get tailor made reports.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formreport" name="formreport" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Report Type <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selreport" name="selreport" onchange="setControlsForReport(this)">                              
                            <option value="0" id="0">-- Select A Report Type --</option>
                            <option value="1" id="1">Revenue by Products</option>
                            <option value="2" id="2">Revenue by Campaigns</option>
                            <option value="3" id="3">Progress By Employee</option>  
                        </select>
                    </div>
                </div>
                <div class="form-group" id="frmgrpDateSel" name="frmgrpDateSel">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtpassword"> Date Range <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="row ">
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input  type="checkbox" onclick="setDateControlState(this)"> Get all records
                                                        <input type="hidden" id="checkall" name="checkall" value="0" >
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div class="  input-prepend input-group">
                                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="01/01/2016 - 01/25/2016">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                </div>
                <div class="form-group" id="frmgrpEmployee" name="frmgrpEmployee" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtempid"> Employee <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selemp" name="selemp">                              
                            <option value="0" id="0">-- All Employees --</option>

                            <?php
                            if (count($data['user']) > 0) {
                                foreach ($data['user'] as $user) {
                                    ?>
                                    <option value="<?php echo $user->id ?>" id="<?php echo $user->id ?>"><?php echo $user->name ?></option>
                                <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group" id="frmgrpProducts" name="frmgrpProducts" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtempid"> Products <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selprod" name="selprod">                              
                            <option value="0" id="0">-- All Products --</option>
                            <?php
                            if (count($data['product']) > 0) {
                                foreach ($data['product'] as $product) {
                                    ?>
                                    <option value="<?php echo $product->id ?>" id="<?php echo $product->id ?>"><?php echo $product->name ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="frmgrpCampaign" name="frmgrpCampaign">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtempid"> Campaign <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selcamp" name="selcamp">                              
                            <option value="0" id="0">-- All Campaigns --</option>
                            <?php
                            if (count($data['campaign']) > 0) {
                                foreach ($data['campaign'] as $camps) {
                                    ?>
                                    <option value="<?php echo $camps->id ?>" id="<?php echo $camps->id ?>"><?php echo $camps->name ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="frmgrpBranches" name="frmgrpBranches">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtempid">  Branches <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selbranch" name="selbranch">                              
                            <option value="0" id="0">-- All Branches --</option>
                            <?php
                            if (count($data['branch']) > 0) {
                                foreach ($data['branch'] as $branches) {
                                    ?>
                                    <option value="<?php echo $branches->id ?>" id="<?php echo $branches->id ?>"><?php echo $branches->name ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button onclick="window.history.back()" class="btn btn-primary" type="button">Back</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Generate</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

        </div>
    </div>
</div>

<div id="testdata" name="testdata">


</div>


@endsection
@extends('layouts.admin')

@section('content')
    <?php $assingId =null;?>

<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Leads <small>Add leads to the system.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formaddleads" name="formaddleads" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">
                <div id="incomminglead" name="incomminglead" >
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Name  <?php echo $assingId;?> <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtname" name="txtname" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtcontact" name="txtcontact" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No 2 <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtcontact2" name="txtcontact2" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Home <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txthomecontact" name="txthomecontact" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtOfficecontact"> Office <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtOfficecontact" name="txtOfficecontact" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> NIC No <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtnic" name="txtnic" required="required"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Comment <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtcomment" name="txtcomment" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Branch <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selbranch" name="selbranch">
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            // campaign   branch
                            if (count($data['branch'])) {
                                foreach ($data['branch'] as $branch) {
                                    ?>
                                    <option value="<?php echo $branch->id ?>" id="0"><?php echo $branch->name ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Product <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selproduct" name="selproduct">
                            <option value="0" id="0">-- Select An Option --</option>

                            <?php
                            if (count($data['products'])) {
                                foreach ($data['products'] as $product) {
                                    ?>
                                    <option value="<?php echo $product->id ?>" id="0"><?php echo $product->name ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Campaign <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selcampaign" name="selcampaign">
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            if (count($data['campaign'])) {
                            foreach ($data['campaign'] as $campaign) {
                            ?>
                            <option value="<?php echo $campaign->id ?>" id="0"><?php echo $campaign->name?></option>
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
<!--
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Bulk Add Leads <small>Add leads in bulk excel sheets to the system.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="formbulkaddleads" name="formbulkaddleads" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="" enctype='multipart/form-data'>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Branch <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selbulkbranch" name="selbulkbranch">
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
//                            if (count($data['branch'])) {
//                                foreach ($data['branch'] as $branch) {
//                                    ?>
                                    <option value="//<?php // echo $branch->id ?>" id="0"><?php // echo $branch->name ?></option>
                                    //<?php
//                                }
//                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> File <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="fileexcel" name="fileexcel" required="required" accept=".xlsx, .xls" class="form-control col-md-7 col-xs-12" >
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
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div>-->
    <div id="leads" name="leads" >
    </div>


@endsection
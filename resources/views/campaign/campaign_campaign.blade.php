@extends('layouts.admin')

@section('content')

<!-- Content here -->

<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Campaign <small>Add a new campaign to the system to set leads.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <!-- user_id name started ended campaigntype_id product_id active created_at updated_at -->
            <form id="formcampcreate" name="formcampcreate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Campaign Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtname" name="txtname" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtstartdate"> Start Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date"  id="txtstartdate" name="txtstartdate" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtenddate"> End Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="txtenddate" name="txtenddate" required="required" class="form-control col-md-7 col-xs-12" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcamptype"> Campaign Type <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="txtcamptype" name="txtcamptype">      
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            foreach ($data['camptypes'] as $campType) {
                                ?>
                                <option value="<?php echo $campType->id ?>" ><?php echo $campType->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtproduct"> Product <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="txtproduct" name="txtproduct">   
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            foreach ($data['product'] as $prod) {
                                ?>
                                <option value="<?php echo $prod->id ?>" ><?php echo $prod->name ?></option>
                            <?php } ?>
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

<div id="refreshcamps" name="refreshcamps">


</div>
    
@endsection
@extends('layouts.admin')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Campaign <small>Edit existing campaign.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <!-- user_id name started ended campaigntype_id product_id active created_at updated_at -->
            <form id="formcampedit" name="formcampedit" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Campaign Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtname" name="txtname" required="required" value='<?php echo $data['campaign']->name ?>' class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtstartdate"> Start Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date"  id="txtstartdate" name="txtstartdate"  value='<?php echo $data['campaign']->started ?>'  required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtenddate"> End Date <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="txtenddate" name="txtenddate" value='<?php echo $data['campaign']->ended ?>'  required="required" class="form-control col-md-7 col-xs-12" >
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
                              <option <?php echo ($data['campaign']->campaigntype_id == $campType->id )? 'selected' : '' ?> value="<?php echo $campType->id ?>" ><?php echo $campType->name ?></option>
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
                            <option <?php echo  ($data['campaign']->product_id == $prod->id )? 'selected' : ''  ?> value="<?php echo $prod->id ?>" ><?php echo $prod->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button onclick="window.history.back()" class="btn btn-primary" type="button">Back</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="hash" value="<?php echo $data['campaign']->id ?>">
            </form>
        </div>
    </div>
</div>

@endsection
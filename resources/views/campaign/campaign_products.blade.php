@extends('layouts.admin')

@section('content')
<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Products <small>Add or create new products to the system.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formaddproduct" name="formaddproduct" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Product Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtproductname" name="txtproductname" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea required="required" id="txtdescription" name="txtdescription" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-3 col-sm-3 col-xs-12" >
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;">
                                    <input id="txthasinternal" name="txthasinternal" type="checkbox" class="flat"  style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> Has Internal Processes.
                            </label>
                        </div>                        
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

<div id="refreshProducts">


    
</div>

@endsection
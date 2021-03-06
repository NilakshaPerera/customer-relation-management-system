@extends('layouts.admin')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">    
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Lines <small>Add a new line and assign a call agent.</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="frmcreateline" name="frmcreateline" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtlinename"> Line Number  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="number" name="number" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>

<div id="refreshLines" name="refreshLines">
    
</div>

<form id="lineToken" name="lineToken">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection
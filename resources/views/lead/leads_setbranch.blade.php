@extends('layouts.admin')

@section('content')

<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Set a Branch <small>Assign a branch to the lead.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formsetleads" name="formsetleads" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Name 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?php echo $data['leads']->client->name?>" readonly class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" readonly value="<?php echo $data['leads']->client->phone?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Email 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" readonly  value="<?php echo $data['leads']->client->email?>" class="form-control col-md-7 col-xs-12" >
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
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Campaign 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" readonly value="<?php echo $data['leads']->campaign->name ?>"  class="form-control col-md-7 col-xs-12" >
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
                <input type="hidden" name="hash" id="hash" value="{{ $data['leads']->id }}">
            </form>
        </div>
    </div>
</div>


@endsection
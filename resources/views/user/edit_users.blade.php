@extends('layouts.admin')
@section('content')

<?php // var_dump($data['branches']) ?>

<!-- Content here -->
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Change User <small>Change the details of this user.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formuserupdate" name="formuserupdate" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtname" name="txtname" required="required" value="<?php echo $data['users']->name ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtempid"> Employee ID <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  id="txtempid" name="txtempid" required="required" value="<?php echo $data['users']->empid ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="txtemail" name="txtemail" required="required" value="<?php echo $data['users']->email ?>" class="form-control col-md-7 col-xs-12" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtcontact" name="txtcontact" required="required" value="<?php echo $data['users']->contact ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Branch <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selbranch" name="selbranch">                              
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php if (count($data['branches']) > 0) {
                                foreach ($data['branches'] as $branch) {
                                    ?>                            
                                    <option <?php echo ($data['users']->branch_id == $branch->id )? 'selected' : '' ?> value="<?php echo $branch->id ?>" id="<?php echo $branch->id ?>"><?php echo $branch->name . ' - ' . $branch->city->name ?></option>                            
                                <?php }
                            }
                            ?>   
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Role <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selrole" name="selrole">    
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php if (count($data['roles']) > 0) {
                                foreach ($data['roles'] as $role) {
                                    ?>                            
                                    <option  <?php echo ($data['users']->role_id == $role->id )? 'selected' : '' ?> value="<?php echo $role->id ?>" id="<?php echo $role->id ?>"><?php echo $role->name ?></option>                            
                                    <?php }
                                }
                                ?>                            
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button onclick="window.location = '{{url('/manageUsers')}}'" class="btn btn-primary" type="button">Back</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="hash" id="hash" value="<?php echo $data['users']->id  ?>">
            </form>
        </div>
    </div>
</div>

@endsection

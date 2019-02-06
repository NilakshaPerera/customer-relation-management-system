@extends('layouts.admin')

@section('content')

<!-- Content here -->
Edit branch  
<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Set Branches <small>Edit existing branches.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="formupdatebranch" name="formupdatebranch" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Branch Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php echo $data['branches']->name ?>" type="text" id="txtbranchname" name="txtbranchname" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Branch Location <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selcity1" name="selcity1" disabled="">                              
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            if (count($data['cities']) > 0) {
                                foreach ($data['cities'] as $city) {
                                    ?>                            
                                    <option <?php echo ($city->id == $data['branches']->city_id) ? 'selected' : ''; ?> value="<?php echo $city->id ?>" id="<?php echo $city->id ?>"><?php echo $city->name ?></option>                            
                                    <?php
                                }
                            }
                            ?>   
                        </select>
                        <input type="hidden" id="selcity" name="selcity" value="<?php echo  $data['branches']->city_id ?>" />
                    </div>
                </div>
                
                <script>
                var coveredCities = [];
                </script>
                
                <?php 
                    $covered = $data['branches']->covercity_id; 
                    $covered = explode(', ', $covered);
                        foreach($covered as $cov){
                ?>
                    <script>
                        coveredCities.push(<?php echo $cov ?>);               
                    </script>
                <?php    
                        }
                ?>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Covered Cities <span class="required">*</span>
                    </label>

                    <div id="wrapper" class="col-md-6 col-sm-6 col-xs-12">
                        <select id="select-tools">

                        </select>
                    </div>

                </div>
                <div class="demo">
                    <div class="control-group">

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
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#select-tools')[0].selectize.setValue(coveredCities);
</script>
@endsection
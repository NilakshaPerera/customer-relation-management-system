@extends('layouts.admin')

@section('content')

<!-- Content here -->
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Campaign <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="selbulkcampaign" name="selbulkcampaign">    
                            <option value="0" id="0">-- Select An Option --</option>
                            <?php
                            if (count($data['campaign'])) {
                                foreach ($data['campaign'] as $campaign) {
                                    ?>
                                    <option value="<?php echo $campaign->id ?>" id="0"><?php echo $campaign->name ?></option>                            
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> File <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">   
                        <input type="file" id="fileexcel" name="fileexcel" required="required" accept=".xlsx, .xls, .csv" class="form-control col-md-7 col-xs-12" >
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


<?php if (count($data['leads']) > 0) { ?>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell;">Added User</th>
                                <th class="column-title" style="display: table-cell;">Name</th>
                                <th class="column-title" style="display: table-cell;">Phone</th>
                                <th class="column-title" style="display: table-cell;">Email</th>
                                <th class="column-title" style="display: table-cell;">Branch</th>
                                <th class="column-title" style="display: table-cell;">Campaign</th>
                                <th class="column-title" style="display: table-cell;">Added On</th>
                                <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
    <?php foreach ($data['leads'] as $lead) { ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $lead->user->name ?></td>
                                    <td class=" "><?php echo $lead->name ?></td>
                                    <td class=" "><?php echo $lead->phone ?></td>
                                    <td class=" "><?php echo $lead->email ?></td>
                                    <td class=" "><?php echo $lead->branch->name ?></td>
                                    <td class=" "><?php echo $lead->campaign->name ?></td>
                                    <td class=" "><?php echo $lead->created_at ?></td>
                                    <td class=" last">
                                        <a href="#"><span class="label label-primary">Edit</span></a>
                                        <a href="#"><span class="label label-danger">Delete</span></a>
                                    </td>
                                </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<?php } ?>

@endsection
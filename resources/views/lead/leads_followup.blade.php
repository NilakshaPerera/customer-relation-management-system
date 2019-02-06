@extends('layouts.admin')

@section('content')
<!-- Content here -->
<div id="leadFollowUpElement" name="leadFollowUpElement" class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Attempt History<small>User's conversion track record.</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <section class="content invoice">
                <div class="row">
                    <div class="col-xs-12 invoice-header">
                        <h2>
                            <i class="fa fa-user"></i> <?php echo $data['leads']->name ?>
                            <small class="pull-right">Lead In Date: <?php echo $data['leads']->created_at ?></small>
                        </h2>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong><u>Lead Details</u></strong>
                        <address>
                            <br><strong>Email  : </strong><?php echo $data['leads']->email ?>
                            <br><strong>Contact No  : </strong><?php echo $data['leads']->phone ?>
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <strong><u>Campaign Details</u></strong>
                        <address>
                            <br><strong>Name  : </strong><?php echo $data['leads']->campaign->name ?>
                            <br><strong>Type  : </strong><?php echo $data['leads']->campaign->campaign_type->name ?>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <strong><u>Product Details</u></strong>
                        <address>
                            <br><strong>Name  : </strong><?php echo $data['leads']->product->name ?>
                            <br><strong>Description  : </strong><?php echo $data['leads']->product->description ?>
                        </address>
                    </div>
                </div>
                <?php if ( array_key_exists('additional', $data) && $data['additional']) { ?>
                    <div class='row invoice-info'>
                        <div class="col-sm-4 invoice-col">
                        <strong><u>Additional Data</u></strong>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <br><strong>Old Car :</strong> <?php echo $data['additional']->oldcar ?>
                                <br><strong>Old Car Value (lkr) :</strong> <?php echo number_format($data['additional']->oldcarvalue, 2) ?>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <strong><u></u></strong>
                            <address>
                                <br><strong>New Car :</strong> <?php echo $data['additional']->newcar ?>
                                <br><strong>New Car Value (lkr) :</strong> <?php echo number_format($data['additional']->newcarvalue, 2) ?>
                            </address>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-xs-12 table">

                        <?php
                        $i = 1;
                        if (count($data['followup']) > 0) {
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th >Attempt</th>
                                        <th style="width: 50%">Comments</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['followup'] as $followup) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>                                    
                                            <td><?php echo $followup->comment ?> </td>
                                            <td><?php echo $followup->conversionstatus->name ?></td>
                                            <td><?php echo $followup->created_at ?></td>    
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                No attempt history available for this lead.
                            </p>
                        <?php } ?>

                        <?php if ($data['leads']->revenue) { ?>
                            <div class='col-sm-4 pull-right'>
                                <h2>Brought Revenue (lkr) : {{$data['leads']->revenue}} </h2>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row no-print">
                    <div class="col-xs-12">
                        <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<?php if ($data['showForm']) { ?>

    <div class="col-md-12 col-sm-12 col-xs-12">    
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Follow up Information<small>Follow up this person and mark latest status.</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="formaddfollowup" name="formaddfollowup" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Status 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="selstatus" name="selstatus">                              
                                <?php foreach ($data['convstatus'] as $status) { ?>
                                    <option value="<?php echo $status->id ?>" id="1"><?php echo $status->name ?> -  <?php echo $status->detail ?> </option>                              
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Comments
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea required="required" id="txtdescription" name="txtdescription" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Revenue (lkr)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="txtrevenue" name="txtrevenue"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    {{--Aditional Documents--}}
                    <div id="documents" style="display: none;">
                        <hr style="border: 1px solid #dcdfda; ">
                        <p style="text-align: center">Documents should be provide by client</p>
                        <input type="hidden" name="lead_id" value="<?php echo $data['leads']->id ?>">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NIC Copy</label>
                                <div class="input-group">
<span class="input-group-addon">
<input type="checkbox" id="nic" name="nic" value="nic">
</span>
                                    <input type="text" id="nic_comment" name="nic_comment" class="form-control">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-1">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary Slip</label>
                                <div class="input-group">
<span class="input-group-addon">
<input type="checkbox" id="salarySlip" name="salarySlip" value="salarySlip">
</span>
                                    <input type="text" id="salarySlip_comment" name="salarySlip_comment" class="form-control">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="overall_comments">Overall Comments
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="overall_comments" name="overall_comments" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button onclick="window.history.back()" class="btn btn-primary" type="button">Back</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="hash" id="hash" value="{{ $data['leads']->id }}">
                </form>
            </div>
        </div>
    </div>

<?php } ?>
<script>
    function showInput(that) {
        if (that.value == "1"){
            document.getElementById('documents').style.display = "block";
        }else {
            document.getElementById('documents').style.display = "none";
        }
    }
</script
@endsection
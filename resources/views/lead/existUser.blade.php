<div class="modal " tabindex="-1"  id ="incomming_call_model" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{url('images/call.gif')}}" style="height: 100px;">
                    </div>
                    <div class="col-md-6">
                        <h1 style="padding-top: 15px;font-weight: 900" >Incoming Call</h1>
                    </div>
                </div>


            </div>

            <div class="modal-body">

                <br>
                <form id="formnewlead" name="formnewlead" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="">
                    <div id="incomminglead" name="incomminglead" >

                    </div>
                    <input type="hidden" id ="incomingCallId" name="incomingCallId" valu="<?php echo ($data['incomingCallId']<>null)? $data['incomingCallId']:null;?>">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtname" name="txtname" required="required" value="<?php echo ($data['user'] <> null)?$data['user']->name:''  ?> " class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if(count($data['user'])>=1)
                            <input type="text" id="txtcontact" name="txtcontact" required="required" value="<?php echo $data['user']->phone ?>" class="form-control col-md-7 col-xs-12">
                            @elseif($data['callerNumber'])
                            <input type="text" id="txtcontact" name="txtcontact" required="required" value="<?php echo $data['callerNumber']; ?>" class="form-control col-md-7 col-xs-12">
                            @else
                            <input type="text" id="txtcontact" name="txtcontact" required="required" value="" class="form-control col-md-7 col-xs-12">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Contact No 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtcontact2" name="txtcontact2" required="required" value="<?php echo ($data['user'] <> null)?$data['user']->phone_2:''  ?> "  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact"> Home <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txthomecontact" name="txthomecontact" required="required" value="<?php echo ($data['user'] <> null)?$data['user']->phone_home:''  ?> "  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtOfficecontact"> Office <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtOfficecontact" name="txtOfficecontact" required="required" value="<?php echo ($data['user'] <> null)?$data['user']->phone_office:''  ?> "  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtcontact">NIC No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if(count($data['user'])>=1)
                            <input type="text" id="txtnic" name="txtnic" required="required" value="<?php echo $data['user']->nic ?>" class="form-control col-md-7 col-xs-12">
                             @else
                            <input type="text" id="txtnic" name="txtnic" required="required" value="" class="form-control col-md-7 col-xs-12">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtemail"> Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if(count($data['user'])>=1)
                            <input type="text" id="txtemail" name="txtemail" required="required" value="<?php echo $data['user']->email ?>" class="form-control col-md-7 col-xs-12">
                            @else
                            <input type="text" id="txtemail" name="txtemail" required="required" class="form-control col-md-7 col-xs-12">
                            @endif

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
                                if (count($data['product'])) {
                                    foreach ($data['product'] as $prduct) {
                                        ?>
                                        <option value="<?php echo $prduct->id ?>" id="0"><?php echo $prduct->name ?></option>
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
                                        <option value="<?php echo $campaign->id ?>" id="0"><?php echo $campaign->name ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="ln_solid"></div>
                </form>

                <?php if (array_key_exists('leads', $data)) { ?>
                    <div style='overflow:auto;height:400px;'>
                        <div class="">
                            @foreach($data['leads'] as $lead)
                            <div id="leadFollowUpElement" name="leadFollowUpElement" class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Lead History<small>User's conversion track record.</small></h2>
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
                                                        <i class="fa fa-user"></i> <?php echo $lead->name ?>
                                                        <small class="pull-right">Lead In Date: <?php echo $lead->created_at ?></small>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    <strong><u>Lead Details</u></strong>
                                                    <address>
                                                        <br><strong>Email  : </strong><?php echo $lead->email ?>
                                                        <br><strong>Contact No  : </strong><?php echo $lead->phone ?>
                                                    </address>
                                                </div>

                                                <div class="col-sm-4 invoice-col">
                                                    <strong><u>Campaign Details</u></strong>
                                                    <address>
                                                        <br><strong>Name  : </strong><?php echo $lead->campaign->name ?>
                                                        <br><strong>Type  : </strong><?php echo $lead->campaign->campaign_type->name ?>
                                                    </address>
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <strong><u>Product Details</u></strong>
                                                    <address>
                                                        <br><strong>Name  : </strong><?php echo $lead->product->name ?>
                                                        <br><strong>Description  : </strong><?php echo $lead->product->description ?>
                                                    </address>
                                                </div>
                                            </div>
                                            <?php if (array_key_exists('additional', $data) && $data['additional']) { ?>
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
                                                    $followups = \App\Followup::where('generallead_id', $lead->id)->get();
                                                    if (count($followups) > 0) {
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
                                                                <?php foreach ($followups as $followup) { ?>
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

                                                    <?php if ($lead->revenue) { ?>
                                                        <div class='col-sm-4 pull-right'>
                                                            <h2>Brought Revenue (lkr) : {{$lead->revenue}} </h2>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <h2>Complains</h2>
                                                <div class="col-xs-12 table">

                                                    <?php
                                                    $i = 1;
                                                    $complains = \App\Complain::where('lead_id', $lead->id)->where('client_id', $data['user']->id)->get();
                                                    if (count($complains) > 0) {
                                                        ?>
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th >Attempt</th>
                                                                    <th style="width: 50%">Complain</th>
                                                                    <th>Date</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($complains as $complain) { ?>
                                                                    <tr>
                                                                        <td><?php echo $i++; ?></td>
                                                                        <td><?php echo $complain->complain ?> </td>
                                                                        <td><?php echo $complain->created_at ?></td>

                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            </tbody>
                                                        </table>
                                                    <?php } else { ?>
                                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                            No Complain history available for this lead.
                                                        </p>
                                                    <?php } ?>


                                                </div>
                                            </div>
                                            <div class="row no-print">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                                </div>
                                            </div>
                                        </section>
                                        <form id="complain_<?php echo $lead->id ?>" name="complain_<?php echo $lead->id ?>" class="complaint_form"  action="">
                                            <input type="hidden" name ="lead_id" value="<?php echo $lead->id ?>">
                                            <input type="hidden" name ="user_id" value="<?php echo $data['user']->id ?>">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Comment  <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <input type="text" id="txtcomment" name="txtcomment" required="required" class="form-control col-md-7 col-xs-12">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                                    <button type="submit"  class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                    </div>
                <?php } ?>


                <div class="row">
                    <div id="alertSuccess" name="alertSuccess" class="alert alert-success alert-dismissible text-center"  style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>SUCCESS!</strong>
                    </div>
                    <div id="alertWarning" name="alertWarning" class="alert alert-warning alert-dismissible text-center" style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Warning!</strong> <span id="alertWarningMessage"></span>
                    </div>
                    <div id="alertError" name="alertError" class="alert alert-danger alert-dismissible text-center" style=" z-index:9000; right: 0; bottom: 0; position: fixed; display: none"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> <span id="alertErrorMessage"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function alertMessage(type, message = "", sustainPeriod = 1000) {

        switch (type) {
            case 1:
                $('#alertSuccess').fadeIn(sustainPeriod, function () {});
                $('#alertSuccess').fadeOut(sustainPeriod, function () {});
                break;
            case 2:
                $('#alertWarningMessage').text(message);
                $('#alertWarning').fadeIn(sustainPeriod, function () {});
                break;
            case 2:
                $('#alertErrorMessage').text(message);
                $('#alertError').fadeIn(sustainPeriod, function () {});
                break;
    }

    }
    $('.complaint_form').submit(function (e) {

        e.preventDefault();
        console.log('hello');
        console.log($(this).find("input[name='txtcomment']").val());
        $.ajax({
            url: "{{url('lead/submitcomplain')}}",
            type: 'post',
            data: {
                lead_id: $(this).find("input[name='lead_id']").val(),
                client_id: $(this).find("input[name='user_id']").val(),
                _token: $(this).find("input[name='_token']").val(),
                comment: $(this).find("input[name='txtcomment']").val()
            },
            success: function (respond) {

                if (respond.success) {
                    alertMessage(1);

                }
            },
            complete: function () {

            }
        });
    });

    $('#formnewlead').submit(function (e) {

        e.preventDefault();
        console.log('in');
        var data = $('#formnewlead').serialize();
        console.log(data);
        $.ajax({
            url: "{{url('lead/create')}}",
            type: 'post',
            data: data,
            success: function (respond) {

                if (respond.success) {

                    alertMessage(1);
                    $('#formaddleads').get(0).reset();
                } else {
                    alertMessage(2);
                }
            },
            complete: function () {

            }
        });
    });

</script>
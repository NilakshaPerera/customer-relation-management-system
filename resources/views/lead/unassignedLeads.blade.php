@extends('layouts.admin')

@section('content')


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
                            <th class="" style="display: table-cell; width: 100px">Email</th>
                            <th class="column-title" style="display: table-cell;">Branch</th>
                            <th class="column-title" style="display: table-cell;">Product</th>
                            <th class="column-title" style="display: table-cell;">Action</th>
                            <th class="column-title" style="display: table-cell;">Added On</th>

                            <th class="bulk-actions" colspan="7" style="display: none;">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($unassignedLeads as $lead) { ?>
                        <tr class="even pointer">
                            <td class=" "><?php echo $lead->user->name ?></td>
                            <td class=" "><?php echo $lead->client->name ?></td>
                            <td class=" "><?php echo $lead->client->phone ?></td>
                            <td class=" "><?php echo $lead->client->email ?></td>
                            <td class=" "><?php echo ($lead->branch_id == NULL) ? 'N/A' : $lead->branch->name ?></td>
                            <td class=" "><?php echo $lead->product->name ?></td>
                            <td class=" "><button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo '#'.$lead->id?>">Assign agent</button></td>
                            <td class=" "><?php echo $lead->created_at ?></td>
                            <!--                                    <td class=" last">
                                                            <a href="#"><span class="label label-primary">Edit</span></a>
                                                            <a href="#"><span class="label label-danger">Delete</span></a>
                                                        </td>-->
                        </tr>

                        <div class="modal fade" tabindex="-1" id ="<?php echo $lead->id?>" role="dialog" aria-labelledby="gridSystemModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel" style="text-align: center">Assign Agent </h4>
                                    </div>

                                    <div class="modal-body">
                                        <form  method="post" action="{{url('/assignAgent')}}" >
                                            {{ csrf_field() }}
                                            <input type="hidden" value="<?php echo $lead->id?>" name="leadId" id ="lead">
                                            <input type="hidden" value="{{csrf_token()}}" name="_token" id ="_token">
                                            <div class="form-group row pt-3">
                                                <div class="col-md-3 ">
                                                    <label for="assined-agent" class=" col-form-label label-font-size">Assign Agent</label>
                                                </div>

                                                <div class="col-md-6">
                                                    <select name ="agentId"  id="agentId" class="form-control "  data-live-search="true" >
                                                        @foreach($agents as $agent)
                                                            <option value="{{$agent->id}}">{{$agent->name}}
                                                                @if(config('constants.roles.administrator') == Auth::user()->role_id)
                                                                    <span>({{$agent->branch->name}})</span>
                                                            @endif</option>
                                                        @endforeach>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script>

    </script>
    <script>


        $("#jstable").DataTable({
            dom: "Blfrtip",
            keys: true,
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm"
                },
                {
                    extend: "csv",
                    className: "btn-sm"
                },
                {
                    extend: "excel",
                    className: "btn-sm"
                },
                {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                },
                {
                    extend: "print",
                    className: "btn-sm"
                },
            ],
            responsive: true
        });

    </script>
@endsection
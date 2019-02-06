@extends('layouts.admin')

@section('content')

<!-- Content here -->
<?php if (count($data['leads']) > 0) { ?>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell;">Product</th>
                                <th class="column-title" style="display: table-cell;">Campaign</th>
                                <th class="column-title" style="display: table-cell;">Name</th>
                                <th class="column-title" style="display: table-cell;">Phone</th>
                                <th class="column-title" style="display: table-cell;">Email</th>
                                <th class="column-title" style="display: table-cell;">Revenue</th>

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

                                    <td class=" "><?php echo $lead->product->name ?></td>
                                    <td class=" "><?php echo $lead->campaign->name ?></td>
                                    <td class=" "><?php echo $lead->client->name ?></td>
                                    <td class=" "><?php echo $lead->client->phone ?></td>
                                    <td class=" "><?php echo $lead->client->email ?></td>
                                    <td class=" "><?php echo $lead->revenue ?></td>

                                    <td class=" "><?php echo $lead->created_at ?></td>
                                    <td class=" last">
                                        <a href="{{action('lead\LeadCompletedController@show', ['id' => $lead->id])}}"><span class="label label-primary">View</span></a>
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
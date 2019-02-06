<?php if (count($data['campaign']) > 0) { ?>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell; width: 100px">Campaign Name</th>
                                <th class="column-title" style="display: table-cell; width: 100px">Product</th>
                                <th class="column-title" style="display: table-cell; width: 60px">Campaign Type</th>
                                <th class="column-title" style="display: table-cell; width: 60px">Start Date</th>
                                <th class="column-title" style="display: table-cell; width: 60px">End Date</th>

                                <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span>
                                </th>
                                <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['campaign'] as $camps) {
                                ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $camps->name ?></td>
                                    <td class=" "><?php echo $camps->product->name ?></td>
                                    <td class=" "><?php echo $camps->campaign_type->name ?></td>
                                    <td class=" "><?php echo $camps->started ?></td>
                                    <td class=" "><?php echo $camps->ended ?></td>
                                    <td class=" last">
                                        <a href="{{action('campaign\CampaignController@edit', ['id' => $camps->id])}}"><span class="label label-primary">Edit</span></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<?php } ?>


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
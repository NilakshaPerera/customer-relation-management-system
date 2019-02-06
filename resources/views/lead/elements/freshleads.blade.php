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
                                <th class="" style="display: table-cell; width: 100px">Email</th>
                                <th class="column-title" style="display: table-cell;">Branch</th>
                                <th class="column-title" style="display: table-cell;">Product</th>
                                <th class="column-title" style="display: table-cell;">Comment</th>
                                <th class="column-title" style="display: table-cell;">Added On</th>
    <!--                                <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action1</span>
                                </th>-->
                                <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['leads'] as $lead) { ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $lead->user->name ?></td>
                                    <td class=" "><?php echo $lead->client->name ?></td>
                                    <td class=" "><?php echo $lead->client->phone ?></td>
                                    <td class=" "><?php echo $lead->client->email ?></td>
                                    <td class=" "><?php echo ($lead->branch_id == NULL) ? 'N/A' : $lead->branch->name ?></td>
                                    <td class=" "><?php echo $lead->product->name ?></td>
                                    <td class=" "><?php echo $lead->comment ?></td>
                                    <td class=" "><?php echo $lead->created_at ?></td>
        <!--                               <td class=" last">
                                        <a href="#"><span class="label label-primary">Edit</span></a>
                                        <a href="#"><span class="label label-danger">Delete</span></a>
                                    </td>-->
                                </tr>
                            <?php } ?>
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
        order:[[6,"desc"]],
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

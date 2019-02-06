
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell;">Emp Name</th>
                                <th class="column-title" style="display: table-cell;">Emp ID</th>
                                <th class="column-title" style="display: table-cell;">Branch</th>
                                
                                <th class="column-title" style="display: table-cell;">All Leads</th>
                                <th class="column-title" style="display: table-cell;">In Progress</th>
                                <th class="column-title" style="display: table-cell;">Positive</th>
                                <th class="column-title" style="display: table-cell;">Negative</th>
                                <th class="column-title" style="display: table-cell;">Converted</th>
                                <th class="column-title" style="display: table-cell;">Revenue(lkr)</th>
     
                                <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  if(count($data['users']) > 0) { 
                                foreach($data['users'] as $user){
                                ?>
                            <tr class="pointer odd" role="row">

                                <td class="sorting_1" tabindex="0"><?php echo $user['name'] ?></td>
                                <td class=" "><?php echo $user['empid'] ?></td>
                                <td class=" "><?php echo $user['branch'] ?></td>
                                
                                <td class=" "><?php echo $user['totalleads'] ?></td>
                                <td class=" "><?php echo $user['inprogressleads'] ?></td>
                                <td class=" "><?php echo $user['positiveleads'] ?></td>
                                <td class=" "><?php echo $user['negativeleads'] ?></td>
                                <td class=" "><?php echo $user['converted'] ?></td>
                                <td class=" "><?php echo $user['revenue'] ?></td>

                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



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
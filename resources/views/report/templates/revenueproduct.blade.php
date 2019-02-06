
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell;">Product Name</th>
                                <th class="column-title" style="display: table-cell;">Active</th>
                                <th class="column-title" style="display: table-cell;">Negative Leads</th>
                                <th class="column-title" style="display: table-cell;">In-Progress</th>
                                <th class="column-title" style="display: table-cell;">Converted Lead Count</th>
                                <th class="column-title" style="display: table-cell;">Revenue from Converted (lkr)</th>
                                <th class="column-title" style="display: table-cell;">Duration</th>                                
  
                                <th class="bulk-actions" colspan="7" style="display: none;">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <?php // var_dump($data['products'])?>
                        <tbody>
                            <?php if(count($data['products']) > 0){ 
                                foreach( $data['products'] as $row  ){
                                ?>
                            
                            <?php print_r($row->generallead->where('conversionstatus_id' , 5)->count('conversionstatus_id')) ?>
                            
                            <tr class="pointer odd" role="row">

                                <td title="<?php echo $row->description ?>" class="sorting_1" tabindex="0"><?php echo $row->name?></td>
                                <td title="" class="" tabindex="0"><?php echo ($row->active)? 'Yes' : 'No'  ?></td>
                                <td class=" "><?php echo $row->generallead->where('conversionstatus_id' , 2)->count('conversionstatus_id') ?></td>
                                <td class=" "><?php echo $row->generallead->where('conversionstatus_id' , 3)->count('conversionstatus_id') ?></td>
                                <td class=" "><?php echo $row->generallead->where('conversionstatus_id' , 1)->count('conversionstatus_id') ?></td>

                                <td class=" "><?php echo number_format( $row->generallead->sum('revenue'), 2)?></td>
                                <td class=" "><?php echo $data['period'] ?></td>
                            </tr>
                            
                            <?php }}  ?>
                            
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
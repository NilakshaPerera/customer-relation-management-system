
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="table-responsive">
                <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr class="headings">

                            <th class="column-title" style="display: table-cell;">Campaign Name</th>
                            <th class="column-title" style="display: table-cell;">Product</th>
                            <th class="column-title" style="display: table-cell;">Campaign Type</th>
                            <th class="column-title" style="display: table-cell;">Total Revenue(LKR)</th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php
                            if( count( $data['camps']) > 0){ 
                            foreach($data['camps'] as $row){
                        ?>
                        
                        <tr class="pointer odd" role="row">

                            <td class="sorting_1" tabindex="0"><?php echo $row->name ?></td>
                            <td class=" "><?php echo $row->product->name ?></td>
                            <td class=" "><?php echo $row->campaign_type->name ?></td>
                            <td class=" "><?php echo number_format($row->generallead->sum('revenue'),2); ?></td> 

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
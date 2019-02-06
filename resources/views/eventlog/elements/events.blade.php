<?php if (count($data['events']) > 0) { ?>



<div class="row tile_count">
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php echo count($data['users']) ?></div>
              
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Events</span>
              <div class="count"><?php echo count($data['events']) ?></div>
             
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Errors</span>
              <div class="count"><?php echo $data['error'] ?></div>
             
            </div>
          </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="display: table-cell; width: 110px">Event Id</th>
                                <th class="column-title" style="display: table-cell; width: 100px">Event Name</th>
                                <th class="column-title" style="display: table-cell; width: 300px">Content</th>
                                <th class="column-title" style="display: table-cell;">Error</th>
                                <th class="column-title" style="display: table-cell; width: 90px">User Name</th>
                                <th class="column-title" style="display: table-cell; width: 90px">User Email</th>
                                <th class="column-title" style="display: table-cell; width: 90px">User Contact</th>
                                <th class="column-title" style="display: table-cell; width: 90px">User EMPID</th>
                                <th class="column-title" style="display: table-cell; width: 90px">Branch</th>
                                <th class="column-title" style="display: table-cell;">Created At</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($data['events'] as $event) {
                                ?>
                                <tr class="even pointer">

                                    <td class=" "><?php echo $event->id ?></td>
                                    <td class=" "><?php echo $event->event ?></td>
                                    <td class=" "><?php echo $event->content ?></td>
                                    <td class=" "><?php echo  ($event->iserror)? 'YES':'NO'; ?></td>
                                    
                                    
                                    <td class=" "><?php echo ($event->user_id > 0)? $event->user->name : 'N/A'?></td>
                                    <td class=" "><?php echo ($event->user_id > 0)? $event->user->email : 'N/A'?></td>
                                    <td class=" "><?php echo ($event->user_id > 0)? $event->user->contact: 'N/A' ?></td>
                                    <td class=" "><?php echo ($event->user_id > 0)? $event->user->empid : 'N/A' ?></td>
                                    <td class=" "><?php echo ($event->user_id > 0)? $event->user->branch->name : 'N/A'?></td>
                                    
                                    
                                    <td class=" "><?php echo $event->created_at ?></td>
       
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
        order:[[0,"desc"]],
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
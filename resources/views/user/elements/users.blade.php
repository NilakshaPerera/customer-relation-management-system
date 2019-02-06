<?php if (count($data['users']) > 0) { ?>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="table-responsive">
                    <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                    <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr class="headings">

                                <th class="column-title" style="min-width: 100px">Name</th>
                                <th class="column-title" style="min-width: 50px">Employee ID</th>
                                <th class="column-title" style="min-width: 90px">Email</th>
                                <th class="column-title" style="min-width: 90px">Contact No</th>
                                <th class="column-title" style="min-width: 100px">Branch</th>
                                <th class="column-title" style="min-width: 50px">Role</th>
                                <th class="column-title" style="min-width: 50px">Action</th>
                                <?php if (Libraries\LogData::isAdmin()) { ?>
                                    <th class="column-title" style="">Active</th>
                                <?php } ?>
    <!--                                <th class="bulk-actions" colspan="8" style="display: none;">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>-->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $currentId = Libraries\LogData::currentId();
                            // role_id branch_id name email contact empid
                            foreach ($data['users'] as $user) {
                                ?>
                                <tr class="even pointer">
                                    <td class=" "><?php echo $user->name ?></td>
                                    <td class=" "><?php echo $user->empid ?></td>
                                    <td class=" "><?php echo $user->email ?></td>
                                    <td class=" "><?php echo $user->contact ?></td>
                                    <td class=" "><?php echo $user->branch->name ?></td>
                                    <td class=" "><?php echo $user->role->name ?></td>
                                    <td class=" last">
                                        <?php if ($data['edituser'] || $data['id'] == $user->id) { ?>
                                            <a href="{{ action('user\UserController@edit', ['id' => $user->id]) }}"><span class="label label-primary">Edit</span></a>
                                            <!--<a href="#"><span class="label label-danger">Delete</span></a>-->
                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                    </td>
                                    <?php if (Libraries\LogData::isAdmin()) { ?>
                                        <td class=""> 
                                            <?php if ($currentId <> $user->id) { ?>
                                                <input onclick="setCheckState(this)" class="chk-activate-user" name="<?php echo $user->id ?>" id="<?php echo $user->id ?>" type="checkbox" <?php echo ( $user->active == 1 ) ? 'checked=""' : '' ?> /> 
                                                <?php
                                            } else {
                                                echo 'N/A';
                                            }
                                            ?>
                                        </td>
                                    <?php } ?>
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

    function setCheckState(obj) {

        var state = null;
        
        if ($(obj).is(':checked')) {
            state = 1;
        } else {
            state = 0;
        }
        
        var data = $('#logout-form').serialize();
        data = data.concat('&id=' + $(obj).attr('id'));
        data = data.concat('&state=' + state);
                
        $.ajax({
            url: "{{url('user/activate')}}",
            type: 'post',
            data: data,
            beforeSend: function (xhr) {
                        
                    },
            success: function (respond) {

                if (respond.success) {
                    alertMessage(1);
                } else {
                    alertMessage(2, respond.error);
                }
            },
            complete: function () {

            }
        });


    }

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





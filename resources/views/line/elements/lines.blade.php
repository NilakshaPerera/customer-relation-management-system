<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="table-responsive">
                <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Line Name</th>
                            <th class="column-title" style="display: table-cell;">Agent Assigned</th>
                            <th class="column-title" style="display: table-cell;">Created At</th>
                            <th class="column-title" style="display: table-cell;">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        use App\Line;
                        use App\User;

                        foreach (Line::all() as $line) {
                            ?>
                            <tr class="even pointer">
                                <td class=""><?php echo $line->number ?></td>
                                <td class="">
                                    <select id="<?php echo $line->id ?>" name="<?php echo $line->id ?>" class="form-control agentlines" style="width: 100%;">                              
                                        <option value="0" id="0">-- Select An Agent --</option>
                                        <?php
                                        $owner = User::where('role_id', 6)
                                                ->where('line_id', $line->id)
                                                ->first();
                                        if ($owner) {
                                            ?>
                                            <option selected="" value="<?php echo $owner->id ?>" id="<?php echo $owner->id ?>"><?php echo $owner->name ?></option>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $blankOwners = User::where('role_id', 6)
                                                ->where('line_id', 0)
                                                ->get();
                                        foreach ($blankOwners as $blankOwner) {
                                            ?>
                                            <option value="<?php echo $blankOwner->id ?>" id="<?php echo $blankOwner->id ?>"><?php echo $blankOwner->name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class=" "><?php echo $line->created_at ?></td>
                                <td class=" "><?php echo $line->updated_at ?></td>
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
<form id="linesToken" name="linesToken">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="line" id="line" value="0">
    <input type="hidden" name="user" id="user" value="0">
</form>

<script>

    $('.agentlines').change(function () {

        $('#line').prop('value', $(this).prop('id'));
        $('#user').prop('value', $(this).val());

        var data = $('#linesToken').serialize();

        $.ajax({
            url: "{{url('/lines/setagent')}}",
            type: 'post',
            data: data,
            success: function (respond) {
                if (respond.success) {
                    refreshLine();
                    alertMessage(1);
                } else {
                    alertMessage(2, respond.error.number);
                }
            },
            complete: function () {

            }
        });
    });


/**
 * Inportant : This function is replicated in the administrator template 
 * @returns {undefined}
 */
    function refreshLine() {
        var data = $('#lineToken').serialize();
        $.ajax({
            url: "{{url('/lines/refresh')}}",
            type: 'post',
            data: data,
            success: function (respond) {
                $('#refreshLines').html(respond);
            },
            complete: function () {

            }
        });
    }


    $("#jstable").DataTable({
        dom: "Blfrtip",
        order: [[0, "desc"]],
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
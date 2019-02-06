<div class="table-responsive col-md-12 col-sm-12 col-xs-12">
<!--<div class="table-responsive col-md-12 col-sm-12 col-xs-12">-->
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">Product</th>
                <th class="column-title">Leads</th>
                <th class="column-title">Credit</th>
                <th class="column-title">Operation</th>
                <th class="column-title">Finance</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (count($data['prodArray']) > 0) {
                foreach ($data['prodArray'] as $prod) {
                    ?>
                    <tr class="even pointer">
                        <td class=" "><h3><strong> <?php echo $prod['prodname'] ?> </strong> </h3></td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"><?php echo $prod['allLeads'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['totalmarketingstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['totalmarketingstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['totalmarketingstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count green"><?php echo $prod['credit'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['creditstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['creditstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['creditstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"> <?php echo $prod['operation'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['operationstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['operationstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['operationstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"><?php echo $prod['finance'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['financestat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['financestat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['financestat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>
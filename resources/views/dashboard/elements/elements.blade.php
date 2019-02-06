<div class="table-responsive col-md-12 col-sm-12 col-xs-12">
<!--<div class="table-responsive col-md-12 col-sm-12 col-xs-12">-->
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">Product</th>
                <th class="column-title">Total Leads</th>
                <th class="column-title">Positive</th>
                <th class="column-title">Negative</th>
                <th class="column-title">Pending</th>
                <th class="column-title">Converted</th>
                <th class="column-title">Revenue</th>
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
                                    <div class="count"><?php echo $prod['totalleads'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['totalleadsstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['totalleadsstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['totalleadsstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count green"><?php echo $prod['positive'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['positivestat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['positivestat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['positivestat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"> <?php echo $prod['negative'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['negativestat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['negativestat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['negativestat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"><?php echo $prod['pending'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['pendingstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['pendingstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['pendingstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class=" ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"><?php echo $prod['converted'] ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['convertedstat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['convertedstat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['convertedstat']['value'],1) ?>% </i> Within last Week</span>
                                </div>
                            </div>
                        </td>
                        <td class="a-right a-right ">
                            <div class="row tile_count">
                                <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count">
                                    <div class="count"><?php echo number_format($prod['revenue']) ?></div>
                                    <span class="count_bottom"><i class="<?php echo ($prod['revenuestat']['raise']) ? 'green' : 'red' ?>"><i class="fa  <?php echo ($prod['revenuestat']['raise']) ? 'fa-sort-asc' : 'fa-sort-desc' ?> "></i><?php echo number_format($prod['revenuestat']['value'],1) ?>% </i> From last Week</span>
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


<!--
<div class="col-md-3 col-sm-12 col-xs-12">
    <div>
        <div class="x_title">
            <h2>Top Profiles</h2>
            <div class="clearfix"></div>
        </div>
        <ul class="list-unstyled top_profiles scroll-view">
            <li class="media event">
                <a class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                </a>
                <div class="media-body">
                    <a class="title" href="#">Ms. Mary Jane</a>
                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                    <p> <small>12 Sales Today</small>
                    </p>
                </div>
            </li>
            <li class="media event">
                <a class="pull-left border-green profile_thumb">
                    <i class="fa fa-user green"></i>
                </a>
                <div class="media-body">
                    <a class="title" href="#">Ms. Mary Jane</a>
                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                    <p> <small>12 Sales Today</small>
                    </p>
                </div>
            </li>
            <li class="media event">
                <a class="pull-left border-blue profile_thumb">
                    <i class="fa fa-user blue"></i>
                </a>
                <div class="media-body">
                    <a class="title" href="#">Ms. Mary Jane</a>
                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                    <p> <small>12 Sales Today</small>
                    </p>
                </div>
            </li>
            <li class="media event">
                <a class="pull-left border-aero profile_thumb">
                    <i class="fa fa-user aero"></i>
                </a>
                <div class="media-body">
                    <a class="title" href="#">Ms. Mary Jane</a>
                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                    <p> <small>12 Sales Today</small>
                    </p>
                </div>
            </li>
            <li class="media event">
                <a class="pull-left border-green profile_thumb">
                    <i class="fa fa-user green"></i>
                </a>
                <div class="media-body">
                    <a class="title" href="#">Ms. Mary Jane</a>
                    <p><strong>$2300. </strong> Agent Avarage Sales </p>
                    <p> <small>12 Sales Today</small>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
-->



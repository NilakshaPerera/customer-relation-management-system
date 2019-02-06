<?php foreach($data['users']  as $user){ ?>

<div class="col-md-3 col-xs-12 widget widget_tally_box">
    <div class="x_panel fixed_height_390">
        <div class="x_content">

            <div class="flex">
                <ul class="list-inline widget_profile_box">
                    <li>
                        <a>

                        </a>
                    </li>
                    <li>
                        <img src="images/user.png" alt="..." class="img-circle profile_img">
                    </li>
                    <li>
                        <a>

                        </a>
                    </li>
                </ul>
            </div>

            <h3 class="name"><?php echo $user['name'] ?></h3>

            <div class="flex">
                <ul class="list-inline count2">
                    <li>
                        <h3><?php echo $user['positiveleads'] ?></h3>
                        <span>Positive</span>
                    </li>
                    <li>
                        <h3><?php echo $user['converted'] ?></h3>
                        <span>Conv.</span>
                    </li>
                    <li>
                        <h3><?php echo $user['revenue'] ?></h3>
                        <span>Revenue</span>
                    </li>
                </ul>
            </div>
            <div class="row text-left flex">
                <div class="col-md-6">
                    <br>
                    <p>
                        <strong> Branch : </strong> 
                        <br>
                        <br>
                        <strong> EmpID : </strong>
                        <br>
                    </p>
                </div>
                <div class='col-md-6 text-left' >
                    <br>
                    <p class='text-left'>
                       <?php echo $user['branch'] ?> 
                        <br>
                        <br>
                         <?php echo $user['empid'] ?> 
                        <br>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
<?php } ?>


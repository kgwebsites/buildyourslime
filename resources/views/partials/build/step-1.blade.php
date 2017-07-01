<h2>Step 1 - Choose Your Color</h2>
<div class="row">
  <?php
    foreach ($colors as $color){
      $color_name = $color->name;
      ?>
      <div class="col-xs-6 col-sm-3 col-md-2 color">
        <a href="/build/step-2/color=<?php echo $color_name; ?>">
          <div class="well">
            <h3><?php echo $color_name; ?></h3>
            <img src="/assets/images/colors/<?php echo $color_name; ?>.png" alt="<?php echo $color_name;?> Slime">
          </div>
        </a>
      </div>
    <?php }
  ?>
</div>

<h2>Step 4 - Choose Your Size</h2>
<div class="row">
  <?php
    foreach ($sizes as $size){
      $size_name = $size->name;
      $size_size = $size->size;
      $size_price = $size->price;
      ?>
      <div class="col-xs-6 col-sm-3 size">
        <a href="/build/step-5/<?php echo $selection; ?>&size=<?php echo $size_name; ?>">
          <div class="well">
            <h3><?php echo $size_name; ?></h3>
            <h4><?php echo $size_size; ?></h4>
            <img src="/assets/images/sizes/<?php echo $size_name; ?>.png" alt="<?php echo $size_name;?> Slime">
            <div><i>$<?php echo $size_price; ?></i></div>
          </div>
        </a>
      </div>
    <?php }
  ?>
</div>

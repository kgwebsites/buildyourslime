<div class="container">
  <h2>Premade Slimes</h2>
  <div class="row premade-slimes">

    <?php
      foreach ($premades as $premade){
        $link = '/order/'.$premade->slug;
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <a href='<?php echo $link; ?>'><h3><?php echo $premade->name ?></h3></a>
          <a href='<?php echo $link; ?>'><img src="<?php echo $premade->image ?>" alt="<?php echo $premade->name ?>"></a>
          <div class="text-center mt-15"><a class="btn btn-lg btn-info" href='<?php echo $link; ?>'>Order</a></div>
          <hr>
        </div>
      <?php }
    ?>
  </div>
</div> <!-- /container -->

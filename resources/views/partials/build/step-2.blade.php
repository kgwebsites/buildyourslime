<h2>Step 2 - Choose Your Glitter</h2>
<div class="row">
  <?php
    foreach ($glitters as $glitter){
      $glitter_name = $glitter->name;
      ?>
      <div class="col-xs-6 col-sm-3 col-md-2 glitter">
        <a href="/build/step-3/<?php echo $selection; ?>&glitter=<?php echo $glitter_name; ?>">
          <div class="well">
            <h3><?php echo $glitter_name; ?></h3>
            <img src="/assets/images/glitters/<?php echo $glitter_name; ?>.png" alt="<?php echo $glitter_name;?> Glitter">
          </div>
        </a>
      </div>
    <?php }
  ?>
</div>

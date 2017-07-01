<h2>Step 3 - Choose Your Add-Ins</h2>
<div class="row">
  <?php
    foreach ($addins as $addin){
      $addin_name = $addin->name;
      ?>
      <div class="col-xs-6 col-sm-3 col-md-2 addin">
        <a href="/build/step-4/<?php echo $selection; ?>&addin=<?php echo $addin_name; ?>">
          <div class="well">
            <h3><?php echo $addin_name; ?></h3>
            <img src="/assets/images/addins/<?php echo $addin_name; ?>.png" alt="<?php echo $addin_name;?> Glitter">
          </div>
        </a>
      </div>
    <?php }
  ?>
</div>

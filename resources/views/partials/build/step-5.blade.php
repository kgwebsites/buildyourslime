<?php
  $color = explode("=", explode("&", $selection)[0])[1];
  $glitter = explode("=", explode("&", $selection)[1])[1];
  $addin = explode("=", explode("&", $selection)[2])[1];
  $size = explode("=", explode("&", $selection)[3])[1];
  $size_sel = DB::table('sizes')->where('name', $size)->first();
?>
<h2>Step 5 - Confirm Order</h2>
<div class="row">

  <div class="col-xs-6 col-sm-3 color">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Slime Color</h2>
      </div>
      <div class="panel-body text-center">
        <p><img src="/assets/images/colors/<?php echo $color; ?>.png"></p>
        <p><?php echo $color;?></p>
        <a class="btn btn-sm btn-danger" href="/build/step-1">Change</a>
      </div>
    </div>
  </div>

  <div class="col-xs-6 col-sm-3 glitter">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Glitter Color</h2>
      </div>
      <div class="panel-body text-center">
        <p><img src="/assets/images/glitters/<?php echo $glitter; ?>.png"></p>
        <p><?php echo $glitter;?></p>
        <a class="btn btn-sm btn-danger" href="/build/step-2/color=<?php echo $color; ?>">Change</a>
      </div>
    </div>
  </div>

  <div class="col-xs-6 col-sm-3 addin">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Add-Ins</h2>
      </div>
      <div class="panel-body text-center">
        <p><img src="/assets/images/addins/<?php echo $addin; ?>.png"></p>
        <p><?php echo $addin;?></p>
        <a class="btn btn-sm btn-danger" href="/build/step-3/color=<?php echo $color; ?>&glitter=<?php echo $glitter; ?>">Change</a>
      </div>
    </div>
  </div>

  <div class="col-xs-6 col-sm-3 size">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Size</h2>
      </div>
      <div class="panel-body text-center">
        <h3><?php echo $size; ?></h3>
        <h3><?php echo $size_sel->size; ?></h3>
        <a class="btn btn-sm btn-danger" href="/build/step-4/color=<?php echo $color; ?>&glitter=<?php echo $glitter; ?>&addin=<?php echo $addin; ?>">Change</a>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-xs-12 text-right">
    <h4>Price: $<?php echo $size_sel->price; ?></h4>
  </div>
  <div class="col-xs-12">
    <a class="btn btn-info btn-lg pull-right" href="/build/step-6/<?php echo $selection; ?>">Checkout</a>
  </div>
</div>

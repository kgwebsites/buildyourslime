<?php
  echo '<h1 class="mt-0">'.$premade->name.'</h1>';
  echo '<div class="row"><div class="col-sm-4 mb-25"><img src="'.$premade->image.'"></div>';
  echo '<div class="col-sm-8 mb-25"><div class="col-xs-12"><div class="row">'.$premade->description.'</div></div>';
  echo '<div class="col-xs-12"><div class="row"><h3>$'.$premade->price.'</h3></div></div>';
  echo '<div class="col-xs-12"><div class="row"><a href="/checkout/'. $premade->slug.'" class="btn btn-success">ORDER</a></div></div></div></div>';
?>

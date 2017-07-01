<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaymentControllers extends Controller
{
  /**
   * Show a list of all of the application's users.
   *
   * @return Response
   */
  public function charge($amount = null)
  {
    $name = "";
    $email = "";
    $street = "";
    $street2 = "";
    $city = "";
    $state = "";
    $zip = "";
    $premade_name = "";
    $color = "";
    $glitter = "";
    $addins = "";
    $size = "";
    $price = 0;

    if ( !empty($_POST['name']) ) {
      $name = $_POST['name'];
    }
    if ( !empty($_POST['email']) ) {
      $email = $_POST['email'];
    }
    if ( !empty($_POST['street']) ) {
      $street = $_POST['street'];
    }
    if ( !empty($_POST['street2']) ) {
      $street2 = $_POST['street2'];
    }
    if ( !empty($_POST['city']) ) {
      $city = $_POST['city'];
    }
    if ( !empty($_POST['state']) ) {
      $state = $_POST['state'];
    }
    if ( !empty($_POST['zip']) ) {
      $zip = $_POST['zip'];
    }
    if ( !empty($_POST['premade_name']) ){
      $premade_name = $_POST['premade_name'];
    }
    if ( !empty($_POST['color']) ) {
      $color = $_POST['color'];
    }
    if ( !empty($_POST['glitter']) ) {
      $glitter = $_POST['glitter'];
    }
    if ( !empty($_POST['addins']) ) {
      $addins = $_POST['addins'];
    }
    if ( !empty($_POST['size']) ) {
      $size = $_POST['size'];
    }
    if ( !empty($_POST['price']) ) {
      $price = (int)$_POST['price'];
    }
    $price_c = $price * 100;

    //Update orders database
    DB::table('buldyourslime_orders')->insert(['name' => $name, 'email' => $email, 'street' => $street, 'street2' => $street2, 'city' => $city, 'state' => $state, 'zip' => $zip, 'size' => $size, 'price' => $price, 'premade_name' => $premade_name, 'color' => $color, 'glitter' => $glitter, 'addins' => $addins]);

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey( env( 'STRIPE_SECRET'));

    // Token is created using Stripe.js or Checkout!
    // Get the payment token submitted by the form:
    $token = $_POST['stripeToken'];

    // Charge the user's card:
    $charge = \Stripe\Charge::create(array(
      "amount" => $price_c,
      "currency" => "usd",
      "description" => "Slime Order",
      "receipt_email" => $email,
      "source" => $token,
    ));
    return redirect(route('/thank-you'));
  }
}

?>

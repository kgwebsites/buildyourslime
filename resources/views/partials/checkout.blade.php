<h2 class="mb-25">Checkout</h2>
<form accept-charset="UTF-8" action="/charge" id="payment-form" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="premade_name" value="<?php echo $premade->name; ?>">
    <input type="hidden" name="price" value="<?php echo $premade->price; ?>">
  <div class="form-group">
    <hr>
    <h3>Customer Details</h3>
    <div class="row">
      <div class="col-sm-6">
        <input class="form-control" id="name" type="text" name="name" value="" placeholder="Name" required>
      </div>
      <div class="col-sm-6">
        <input class="form-control" id="email" type="email" name="email" value="" placeholder="Email" required>
      </div>
    </div>
  </div>

  <div class="form-group">
    <hr>
    <h3>Shipping Address</h3>
    <div class="row">
      <div class="col-sm-9">
        <input class="form-control" id="street" type="text" name="street" value="" placeholder="Street" required>
      </div>
      <div class="col-sm-3">
        <input class="form-control" id="street2" type="text" name="street2" value="" placeholder="(Apt #, Suite #, Etc.)">
      </div>
      <div class="col-sm-4">
        <input class="form-control" id="city" type="text" name="city" value="" required placeholder="City">
      </div>
      <div class="col-sm-4">
        <input class="form-control" id="state" type="text" name="state" value="" required placeholder="State">
      </div>
      <div class="col-sm-4">
        <input class="form-control" id="zip" type="text" name="zip" value="" required placeholder="Zip">
      </div>
    </div>
  </div>

  <div class="form-group">
    <hr>
    <h3>Billing Info</h3>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="card-element">
          Credit or Debit Card
        </label>
        <div id="card-element">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>
      </div>
    </div>

    <div class="form-group">
      <hr>
      <h3>Total</h3>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          $<?php echo $premade->price; ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          <hr>
          <button type="submit" class="btn btn-lg btn-success" name="button">Complete Order</button>
        </div>
      </div>
    </div>
  </div>
</form>

  <script>
  // Create a Stripe client
  var stripe = Stripe('<?php echo env('STRIPE_KEY')?>');

  // Create an instance of Elements
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
    base: {
      color: '#32325d',
      lineHeight: '24px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };

  // Create an instance of the card Element
  var card = elements.create('card', {style: style});

  // Add an instance of the card Element into the `card-element` <div>
  card.mount('#card-element');

  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Handle form submission
  var form = document.getElementById('payment-form');
  var name = $('#name').val();
  var street = $('#street').val();
  var street2 = $('#street2').val();
  var city = $('#city').val();
  var state = $('#state').val();
  var zip = $('#zip').val();
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card, {
    name: name,
    address_city: city,
    address_line1: street,
    address_line2: street2,
    address_state: state,
    address_zip: zip,
    }).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
  }
  </script>

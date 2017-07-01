@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <h1>Dashboard</h1>
  <hr>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="mtb-0">Orders</h2>
    </div>
    <div class="panel-body p-0">
      <div class="responsive-table">
        <table class="table table-hover table-bordered table-striped mb-0">
          <tr>
            <th>Order Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Street</th>
            <th>Street 2</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Color</th>
            <th>Glitter</th>
            <th>Addins</th>
            <th>Size</th>
            <th>Price</th>
          </tr>
          <?php
          foreach($orders as $order){
            $date = $order->date;
            $name = $order->name;
            $email = $order->email;
            $street = $order->street;
            $street2 = $order->street2;
            $city = $order->city;
            $state = $order->state;
            $zip = $order->zip;
            $color = $order->color;
            $glitter = $order->glitter;
            $addins = $order->addins;
            $size = $order->size;
            $price = $order->price;
            ?>
            <tr class="order">
              <td><?php echo $date; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $street; ?></td>
              <td><?php echo $street2; ?></td>
              <td><?php echo $city; ?></td>
              <td><?php echo $state; ?></td>
              <td><?php echo $zip; ?></td>
              <td><?php echo $color; ?></td>
              <td><?php echo $glitter; ?></td>
              <td><?php echo $addins; ?></td>
              <td><?php echo $size; ?></td>
              <td>$<?php echo $price; ?></td>
            </tr>
          <?php }
          ?>
        </table>
        <div class="text-center">{{ $orders->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection

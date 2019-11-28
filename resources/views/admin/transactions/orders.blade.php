@extends('admin.layout.base')

@section('title', 'product orders')

@section('data-page-id', 'adminOrders')

{{-- @endsection --}}

@section('content')
<div class="category">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Orders</h1>
    </div>

  </div>


  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      @if(isset($orders) && count($orders))
        @foreach($orders as $order_num => $details)
        <div class="shadow mb-4">
          <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-success">Order Number : {{ $order_num}}</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <tr>
                    <td><strong>Customer Name: </strong>&nbsp; {{ $details['customer']['fullname'] }}</td>
                    <td><strong>Address: </strong>&nbsp; {{ $details['customer']['address'] }}</td>
                    <td><strong>Order Date: </strong>&nbsp; {{ $details['when'] }}</td>
                    <td><strong>Grand Total: </strong>&nbsp; ${{ $details['total'] }}</td>
                  </tr>
                </table>
                  <hr>
                  <h5 class="m-0 font-weight-bold text-success">Items</h5>
                  <table class="table table-bordered">
                    <tr>
                      <th>Product IMG</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                    @each('admin.transactions.items', $details, 'details')
                  </table>
            </div>
          </div>
        </div>
        @endforeach


      @if(isset($links))
          {!! $links !!}
      @endif
      @else
        <h4>You have not made any sales</h4>
      @endif
    </div>
  </div>
</div>



@endsection

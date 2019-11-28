@extends('admin.layout.base')

@section('title', 'product payments')

@section('data-page-id', 'adminPayments')

{{-- @endsection --}}

@section('content')
<div class="category">
  <div class="row">
    <div class="col-lg">
        <h1 class="round-head">Payments</h1>
      @include('includes.message')
    </div>

  </div>


  <div class="row mt-5" >
    <div class="col-sm-12 col-md-11">
      @if(count($payments))
        <div class="shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">summary of Payments</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                      <th scope="col">Customer</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Order Number</th>
                      <th scope="col">Item Count</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date Created</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($payments as $payment)
                      <tr>
                        <td>{{ $payment['customer']['fullname'] }}</td>
                        <td>{{ $payment['amount'] }}</td>
                        <td>{{ $payment['order_num']}}</td>
                        <td>{{ $payment['item_count']}}</td>
                        <td>{{ $payment['status']}}</td>
                        <td>{{ $payment['added']}}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>


      @if(isset($links))
          {!! $links !!}
      @endif
      @else
        <h4>You have not sold any product</h4>
      @endif
    </div>
  </div>
</div>

@endsection

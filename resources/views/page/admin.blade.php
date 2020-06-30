@extends('master')
@section('content')
<div class="container">
    <br />
    <h3 align="center">Thống Kê Đơn Hàng</h3>
    <br />
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
          <thead>
           <tr>
               <th>Name</th>
               <th>Address</th>
               <th>Date Order</th>
               <th>Date Order</th>
               <th>Payment</th>
               <th>Total</th>

           </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
           <tr>
            <td>{{ $row->name }}</td>

           </tr>
          @endforeach
          </tbody>
      </table>
  </div>
 </div>
@endsection

@extends('admin.layout.base')

@section('title', 'Dashboard')

@section('data-page-id', 'adminDashboard')

@section('content')

  <!-- Begin Page Content -->
         <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
             <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
           </div>

           <!-- Content Row -->
           <div class="row">

             <!-- Order Summmary -->
             <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-primary shadow h-100 pt-2">
                 <div class="card-body">
                   <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orders }}</div>
                     </div>
                     <div class="col-auto">
                       {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                       <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="/admin/transactions/orders" class="card-link">Order Details</a>
                 </div>
               </div>
             </div>

             <!-- Stock Summary -->
             <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 pt-2">
                 <div class="card-body">
                   <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Stock</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
                     </div>
                     <div class="col-auto">
                       {{-- <i class="fas fa-dollar-sign "></i> --}}
                       <i class="fas fa-thermometer-empty fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="admin/products" class="card-link">View Products</a>
                 </div>
               </div>
             </div>

             <!-- Revenue Summary -->
             <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-info shadow h-100 pt-2">
                 <div class="card-body">
                   <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenue</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($payments, 2) }}</div>
                     </div>
                     <div class="col-auto">
                       <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="/admin/transactions/payment" class="card-link">Payment Details</a>
                 </div>
               </div>
             </div>

             <!-- Signup summary -->
             <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-warning shadow h-100 pt-2">
                 <div class="card-body">
                   <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Signup</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                     </div>
                     <div class="col-auto">
                       {{-- <i class="fas fa-comments "></i> --}}
                       <i class="fas fa-users fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="" class="card-link">Registered Users</a>
                 </div>
               </div>
             </div>
           </div>

           <!-- Content Row -->

           <div class="row">

             <!-- Area Chart -->
             <div class="col-xl-7 col-lg-6 monthly-sales">
               <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Monthly Orders</h6>
                   {{-- <div class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                       <div class="dropdown-header">Dropdown Header:</div>
                       <a class="dropdown-item" href="#">Action</a>
                       <a class="dropdown-item" href="#">Another action</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                   </div> --}}
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                   <div class="chart-area">
                     <canvas id="order"></canvas>
                   </div>
                 </div>
               </div>
             </div>

             <!-- Pie Chart -->
             <div class="col-xl-5 col-lg-6 monthly-revenue">
               <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                   <h6 class="m-0 font-weight-bold text-primary">Monthly Revenue</h6>
                   {{-- <div class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                       <div class="dropdown-header">Dropdown Header:</div>
                       <a class="dropdown-item" href="#">Action</a>
                       <a class="dropdown-item" href="#">Another action</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                   </div> --}}
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                   <div class="chart-area">
                     <canvas id="revenue" style="height: 100% !important;"></canvas>
                   </div>
                   {{-- <div class="mt-4 text-center small">
                     <span class="mr-2">
                       <i class="fas fa-circle text-primary"></i> Direct
                     </span>
                     <span class="mr-2">
                       <i class="fas fa-circle text-success"></i> Social
                     </span>
                     <span class="mr-2">
                       <i class="fas fa-circle text-info"></i> Referral
                     </span>
                   </div> --}}
                 </div>
               </div>
             </div>
           </div>

           <!-- Content Row -->


         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

@endsection

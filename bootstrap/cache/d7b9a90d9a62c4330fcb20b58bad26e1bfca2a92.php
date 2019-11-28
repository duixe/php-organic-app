<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('data-page-id', 'adminDashboard'); ?>

<?php $__env->startSection('content'); ?>

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
                       <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($orders); ?></div>
                     </div>
                     <div class="col-auto">
                       
                       <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="" class="card-link">Order Details</a>
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
                       <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($products); ?></div>
                     </div>
                     <div class="col-auto">
                       
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
                       <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo e(number_format($payments, 2)); ?></div>
                     </div>
                     <div class="col-auto">
                       <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
                 <div class="card-footer">
                   <a href="" class="card-link">Payment Details</a>
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
                       <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($users); ?></div>
                     </div>
                     <div class="col-auto">
                       
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
                   
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                   <div class="chart-area">
                     <canvas id="revenue" style="height: 100% !important;"></canvas>
                   </div>
                   
                 </div>
               </div>
             </div>
           </div>

           <!-- Content Row -->
          

         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Organic Store - @yield('title')</title>


  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Oswald:300,400,500,600,700|Pacifico|Poppins:300,400,500,600,700|Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
</head>
<body id="page-top" data-page-id="@yield('data-page-id')">

@yield('body')

  <script async src="/js/app.js"></script>
  @yield('stripe-checkout')
</body>
</html>

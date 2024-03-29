<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    {{ config('app.name', 'Laravel') }} | @yield('title')
  </title>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
  <!-- Include SweetAlert via CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- @include('sweetalert::alert') --}}


  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
  x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
  x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
  :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">

  {{-- @include('sweetalert::alert') --}}
  <!-- ===== Preloader Start ===== -->

  {{-- @include('partials.preloader') --}}
  {{-- <include src="./partials/preloader.html"></include> --}}
  <!-- ===== Preloader End ===== -->

  <!-- ===== Page Wrapper Start ===== -->
  <div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('partials.sidebar')
    {{-- <include src="./partials/sidebar.html"></include> --}}
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
      <!-- ===== Header Start ===== -->
      @include('partials.header')
      {{-- <include src="./partials/header.html" /> --}}
      <!-- ===== Header End ===== -->

      <!-- ===== Main Content Start ===== -->
      <main>

          @yield('content')
      </main>

      <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
  </div>
  <!-- ===== Page Wrapper End ===== -->


</body>

</html>

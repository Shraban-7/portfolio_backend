@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
    <div class="mt-4 mx-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
        <!-- ====== Chart One Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            @include('partials.chart-01')
        </div>
        <!-- ====== Chart One End -->

        <!-- ====== Chart Two Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            @include('partials.chart-02')
        </div>
        <!-- ====== Chart Two End -->

        <!-- ====== Chart Three Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            @include('partials.chart-03')
        </div>
        <!-- ====== Chart Three End -->

        <!-- ====== Map One Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            @include('partials.map-01')
        </div>
        <!-- ====== Map One End -->

        <!-- ====== Table One Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            <!-- Include your table partial here -->
        </div>
        <!-- ====== Table One End -->

        <!-- ====== Chat Card Start -->
        <div class="col-span-12 md:col-span-6 2xl:col-span-4">
            <!-- Include your chat card partial here -->
        </div>
        <!-- ====== Chat Card End -->
    </div>
@endsection

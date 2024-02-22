@extends('layouts.app')

@section('title')
    Achivemnt Manage
@endsection

@section('content')

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden  sm:rounded-lg  shadow-default dark:border-strokedark dark:bg-boxdark">

                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="w-full my-4 text-end">
                        <a href="{{ route('counter.manage') }}" class="bg-primary py-2 mx-4 px-4 text-white border rounded-lg">Back</a>
                    </div>
                    <h2 class="text-2xl font-semibold mb-4 capitalize">Add Achivements</h2>
                    <form action="{{ route('counter.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Name</label>
                            <input type="text" id="name" name="title"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="count" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                counter</label>
                            <input type="number" id="count" name="count"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                >
                        </div>

                        <div class="mb-4">
                            <label for="image"
                                class="mb-3 text-gray-700 block font-medium text-black dark:text-white">Icon</label>
                            <input type="text" id="image" name="image" placeholder="Ex: 'ion-code-working'"

                                class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                           <small>Choose your  icon class name <a target="_blank" class="text-primary" href="https://ionic.io/ionicons/v2">Go here..</a></small>
                        </div>
                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

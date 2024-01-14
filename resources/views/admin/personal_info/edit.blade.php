@extends('layouts.app')

@section('title')
    Personal Information Manage
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
                    <h2 class="text-2xl font-semibold mb-4 capitalize">Add Personal information</h2>
                    <form action="{{ route('personal_info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text">
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                               Full Name</label>
                            <input type="text" id="name" name="full_name" value="{{ old('full_name',$personal_info?->full_name) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="url" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email',$personal_info?->email) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                >
                        </div>
                        <div class="mb-4">
                            <label for="url" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                               Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone',$personal_info?->phone) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                >
                        </div>
                        <div class="mb-4">
                            <label for="url" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address',$personal_info?->address) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                >
                        </div>
                        <div class="mb-4">
                            <label for="url" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Profile</label>
                            <input type="text" id="link" name="profile" value="{{ old('profile',$personal_info?->profile) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                >
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

@extends('layouts.app')

@section('title')
    User Create
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
                        <a href="{{ route('user.manage') }}"
                            class="bg-primary py-2 mx-4 px-4 text-white border rounded-lg">Goto Manage</a>
                    </div>
                    <h2 class="text-2xl font-semibold mb-4">Add Blog</h2>
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Fullname</label>
                            <input type="text" id="name" name="name" value="{{ old('name',$user->name) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Username</label>
                            <input type="text" id="name" name="user_name" value="{{ old('user_name',$user->user_name) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Email</label>
                            <input type="email" id="name" name="email" value="{{ old('email',$user->email) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="mb-3 text-gray-700 block font-medium text-black dark:text-white">
                                Role</label>
                            <select id="role" name="role"
                                class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <option value="" disabled selected>Select Role</option>

                                <option @if ($user?->role=='admin')
                                    selected
                                @endif value="admin">Admin</option>
                                <option @if ($user?->role=='moderator')
                                    selected
                                @endif value="moderator">Moderator</option>
                                <option @if ($user?->role=='client')
                                    selected
                                @endif value="client">Client</option>

                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Password</label>
                            <input type="password" id="name" name="password" value="{{ old('password',$user->password) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Confirm Password</label>
                            <input type="password" id="name" name="password_confirmation" value="{{ old('password',$user->password) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
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

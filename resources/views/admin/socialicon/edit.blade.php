@extends('layouts.app')

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
                        <a href="{{ route('social_icon.manage') }}" class="bg-primary py-2 mx-4 px-4 text-white border rounded-lg">Back</a>
                    </div>
                    <h2 class="text-2xl font-semibold mb-4 capitalize">Update social icon</h2>
                    <form action="{{ route('social_icon.update', $social_icon->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Name</label>
                            <input type="text" id="name" name="title"
                                value="{{ old('title', $social_icon->title) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Link</label>
                            <input type="text" id="name" name="link"
                                value="{{ old('link', $social_icon->link) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="icon" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Icon</label>
                            <input type="text" id="link" name="icon"
                                value="{{ old('icon', $social_icon->icon) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            <small>Choose your icon class name <a target="_blank" class="text-blue-600"
                                    href="https://ionic.io/ionicons/v2">Go here..</a></small>
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




    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

@extends('layouts.app')
@section('title')
    About Manage
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
                    <h2 class="text-2xl font-semibold mb-4">Update about</h2>
                    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Name</label>
                            <input type="text" id="name" name="title" value="{{ old('title', $about?->title) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Description</label>
                            <textarea id="editor" name="description"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required>
                                {{ old('description', $about?->description) }}
                            </textarea>
                        </div>
                        @if ($about)
                            @if ($about->image)
                                <div class="mb-2">
                                    <img class="w-16 h-16 rounded-full object-cover" alt="Image"
                                        src="{{ asset($about?->image) }}">
                                </div>
                            @endif
                        @endif

                        <div class="mb-4">
                            <label for="image"
                                class="mb-3 text-gray-700 block font-medium text-black dark:text-white">Image</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                onchange="previewImage(this)"
                                class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            <div class="mt-2">
                                <img id="image-preview" class="hidden w-16 h-16 rounded-full object-cover"
                                    alt="Image Preview">
                            </div>
                        </div>
                        <div>

                            <button type="submit"
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                @if ($about)
                                    Update
                                @else
                                    ok
                                @endif
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

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

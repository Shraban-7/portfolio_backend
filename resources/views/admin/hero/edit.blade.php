@extends('layouts.app')

@section('title')
    Hero Manage
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
                    <h2 class="text-2xl font-semibold mb-4">Hero Content</h2>
                    <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="mb-3 text-gray-700 block font-medium  text-black dark:text-white">
                                Your Name</label>
                            <input type="text" id="name" name="title" value="{{ old('title', $hero?->title) }}"
                                class="w-full px-4 py-2  border-stroke bg-transparent  font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                required placeholder="I Am User">
                        </div>
                        <div class="mb-4">
                            <label for="name"
                                class="mb-3 text-gray-700 block font-medium text-black dark:text-white">Sub Titles </label>

                            <div class="flex flex-col">

                                <div id="subtitle-container" class="flex-1 mr-2">
                                    @if ($hero && $hero->subtitles)
                                        @foreach ($hero->subtitles as $index => $subtitle)
                                            <div class="flex mb-2">
                                                <input type="text"
                                                    class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                    name="sub_titles[]" placeholder="Subtitle {{ $index + 1 }}"
                                                    value="{{ $subtitle->sub_title }}" attr="{{ $subtitle->id }}" required>
                                                <a href="#"
                                                    onclick="confirmDelete('{{ route('subtitle.delete', $subtitle->id) }}')"
                                                    type="button"
                                                    class="remove-subtitle-button bg-danger text-white p-2 rounded ml-2">Remove</a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="flex mb-2">
                                            <input type="text"
                                                class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                                name="sub_titles[]" placeholder="Subtitle 1">
                                            <button type="button"
                                                class="remove-subtitle-button bg-danger text-white p-2 rounded ml-2"
                                                onclick="removeSubtitleInput(this)">Remove</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button type="button"
                                class="add-subtitle-button rounded my-2 bg-primary p-3 font-medium text-gray"
                                onclick="addSubtitleInput()">Add Subtitle</button>
                        </div>

                        @if ($hero)
                            @if ($hero->image)
                                <div class="mb-2">
                                    <img class="w-16 h-16 rounded-full object-cover" alt="Image"
                                        src="{{ asset('cv/' . ($hero ? $hero->image : '')) }}">
                                </div>
                            @endif
                        @endif
                        <div class="mb-4">
                            <label for="image"
                                class="mb-3 text-gray-700 block font-medium text-black dark:text-white">Image</label>
                            @if ($hero)
                            <input type="file" id="image" name="image" accept="image/*"
                            onchange="previewImage(this)"
                            class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                            @else
                            <input type="file" id="image" name="image" accept="image/*"
                            onchange="previewImage(this)"
                            class="w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" required>
                            @endif
                            <div class="mt-2">
                                <img id="image-preview" class="hidden w-16 h-16 rounded-full object-cover"
                                    alt="Image Preview">
                            </div>
                        </div>
                        <div>
                            @if ($hero)
                                <button type="submit"
                                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                    Update
                                </button>
                            @else
                                <button type="submit"
                                    class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
                                    Submit
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add some margin to subtitle rows */
        #subtitle-container .flex {
            margin-bottom: 8px;
            /* Adjust the value as needed */
        }
    </style>


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

        function addSubtitleInput() {
            const container = document.getElementById('subtitle-container');

            // Check the current count of subtitle rows
            const subtitleRows = container.querySelectorAll('.flex').length;

            // Only add a new row if the count is less than 5
            if (subtitleRows < 5) {
                const inputWrapper = document.createElement('div');
                inputWrapper.className = 'flex';

                const input = document.createElement('input');
                input.classList =
                    'w-full px-4 py-2 border-stroke bg-transparent font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary';
                input.type = 'text';
                input.name = 'sub_titles[]';
                input.placeholder = 'Subtitle';

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'remove-subtitle-button bg-danger text-white p-2 rounded ml-2';
                removeButton.textContent = 'Remove';
                removeButton.onclick = function() {
                    removeSubtitleInput(inputWrapper);
                };

                inputWrapper.appendChild(input);
                inputWrapper.appendChild(removeButton);
                container.appendChild(inputWrapper);
            } else {
                alert('You can only have up to 5 subtitle rows.');
            }
        }


        function removeSubtitleInput(inputWrapper) {
            const container = document.getElementById('subtitle-container');
            const input = inputWrapper.querySelector('input');

            // Check if the input has a value (existing subtitle)
            if (input.value) {
                // You can handle this case, for example, by marking the subtitle for deletion in the backend.
                // Here, we'll add a data attribute to the input to flag it as "to be removed".
                container.removeChild(inputWrapper);
            } else {
                // If the input has no value (newly added subtitle), just remove it from the DOM.
                container.removeChild(inputWrapper);
            }
        }

        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL if confirmed
                    window.location.href = deleteUrl;
                }
            });
        }


        // function removeValuedSubtitleInput(inputWrapper) {
        //     const container = document.getElementById('subtitle-container');
        //     const input = inputWrapper.previousElementSibling; // assuming the input is the previous sibling

        //     // Use getAttribute to access custom attribute 'attr'
        //     const subtitleId = input.getAttribute('attr');
        //     console.log(subtitleId);

        //     // You can now use subtitleId for further processing, such as marking it for deletion in the backend.

        //     // Remove the input wrapper from the container
        //     container.removeChild(inputWrapper);
        // }
    </script>
@endsection

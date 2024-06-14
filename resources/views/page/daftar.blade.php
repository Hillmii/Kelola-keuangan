@extends('main')

@section('content')
    <div class="w-full h-[80vh] flex justify-center items-center">
        <form method="POST" class="w-96 shadow-xl mx-3">
            @csrf
            <div class="w-full p-6 bg-white rounded-lg">
                <div class="mb-5">
                    <h1 class="mb-3 font-semibold text-lg text-center">Daftar</h1>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama <span
                            class="text-pink-500 font-bold">*</span></label>
                    @error('nama')
                        <p class="text-pink-500 mb-2">{{ $message }}</p>
                    @enderror
                    <input type="text" id="nama" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span
                            class="text-pink-500 font-bold">*</span></label>
                    @error('email')
                        <p class="text-pink-500 mb-2">{{ $message }}</p>
                    @enderror
                    <input type="email" id="email" name="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="contoh@gmail.com" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password <span
                            class="text-pink-500 font-bold">*</span></label>
                    @error('password')
                        <p class="text-pink-500 mb-2">{{ $message }}</p>
                    @enderror
                    <input type="password" id="password" name="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>
                <button type="submit"
                    class="text-white bg-emerald-400 hover:bg-emerald-500 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
            </div>
        </form>
    </div>
@endsection

@extends('main')

@section('js')
    <script src="{{ $chartPemasukan->cdn() }}"></script>

    {{ $chartPemasukan->script() }}
    <script src="{{ $chartPengeluaran->cdn() }}"></script>

    {{ $chartPengeluaran->script() }}
@endsection

@section('content')
    {{-- Alert --}}
    @if (Session::has('berhasil'))
        <div class="absolute flex justify-end right-3 top-32">
            <div id="alert-3"
                class="flex max-w-sm items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <p class="ms-3">{{ Session::get('berhasil') }}</p>
                <span class="sr-only">Info</span>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (Session::has('gagal'))
        <div class="absolute flex justify-end right-3 top-32">
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <p class="ms-3">{{ Session::get('gagal') }}</p>
                <span class="sr-only">Info</span>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    {{-- Alert End --}}


    <div class="w-full h-full flex justify-center items-center my-6">
        <div class="text-center">
            <h1 class="mt-3 font-semibold text-xl">SEGERA KELOLA KEUANGANMU</h1>
            <p class="italic">“Jika kamu tidak tahu cara mengelola uangmu, uangmu akan pergi darimu.” - Robert Kiyosaki</p>
        </div>
    </div>

    <section class="w-full h-full lg:flex justify-center gap-3">

        <div
            class="justify-center items-center flex lg:bg-white lg:border lg:border-gray-200 lg:rounded-lg lg:shadow lg:hover:bg-gray-100">
            <div
                class="block p-6 bg-white lg:bg-transparent border border-gray-200 lg:border-none rounded-lg lg:rounded-none shadow lg:shadow-none hover:bg-gray-100 lg:hover:bg-transparent dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                {!! $chartPemasukan->container() !!}
            </div>
        </div>

        </div>
        {{-- Side3 --}}
        <div
            class="justify-center my-6 lg:my-0 items-center flex lg:bg-white  lg:border lg:border-gray-200 lg:rounded-lg lg:shadow lg:hover:bg-gray-100">
            <div
                class="block p-6 bg-white lg:bg-transparent border border-gray-200 lg:border-none rounded-lg lg:rounded-none shadow lg:shadow-none hover:bg-gray-100 lg:hover:bg-transparent dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                {!! $chartPengeluaran->container() !!}
            </div>
        </div>

    </section>


    {{-- Section 2 --}}
    <section class="w-full min-h-[100vh] flex justify-center lg:mt-6">
        <div class="bg-white shadow-lg rounded-lg w-[90%] min-h-[100vh] flex">
            <div class="w-full h-full flex">
                <div class="w-[100%] flex flex-col p-5">

                    {{-- Total tabungan --}}
                    <div class="flex w-full">
                        <div class="flex w-full items-center lg:mt-0 gap-4">

                            <div
                                class="block max-w-xl mb-3 z-10 p-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <div class="flex justify-center items-center">
                                    <h1 class="font-semibold text-sm">Total Tabungan</h1>
                                </div>
                                <p class="font-semibold text-center lg:mb-0 text-base">Rp{{ $total_akhir_tabungan }}
                                </p>
                            </div>

                            <div class="flex w-full justify-end gap-2">
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class="block text-xs mb-6 text-white bg-emerald-400 hover:bg-emerald-500 focus:outline-none font-medium rounded-lg md:text-sm md:px-5 px-2 py-1 md:py-2.5 text-center"
                                    type="button">
                                    Tambah Pemasukan +
                                </button>

                                <button data-modal-target="pengeluaran" data-modal-toggle="pengeluaran"
                                    class="block mb-6 text-xs text-white bg-pink-500 hover:bg-pink-600 focus:outline-none font-medium rounded-lg md:text-sm md:px-5 px-2 py-1 md:py-2.5 text-center"
                                    type="button">
                                    Tambah Pengeluaran +
                                </button>
                            </div>

                            <!-- Konten bagian pertama -->
                            <!-- Modal toggle -->

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Pemasukan
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('pemasukan.store') }}" method="POST" class="p-4 md:p-5">
                                            @csrf
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                        <span class="text-pink-500 font-bold">*</span></label>
                                                    <input type="date" name="date" value="{{ $date }}"
                                                        id="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="price"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                        biaya <span class="text-pink-500 font-bold">*</span></label>
                                                    <input type="number" name="total" id="price" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Rp10.000" required>
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                                        <span class="text-pink-500 font-bold">*</span></label>
                                                    <select name="category" id="category"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option selected="" value="">Pilih category <span
                                                                class="text-pink-500 font-bold">*</span></option>
                                                        <option value="Kerja">Kerja</option>
                                                        <option value="Bisnis">Bisnis</option>
                                                        <option value="Freelance">Freelance</option>
                                                        <option value="Pemberian">Pemberian</option>
                                                        <option value="Penjualan">Penjualan</option>
                                                        <option value="Lainya">Lainya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-emerald-400 hover:bg-emerald-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Tambah
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="pengeluaran" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Pengeluaran
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="pengeluaran">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('pengeluaran.store') }}" method="POST"
                                            class="p-4 md:p-5">
                                            @csrf
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="date"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                        <span class="text-pink-500 font-bold">*</span></label>
                                                    <input type="date" name="date" value="{{ $date }}"
                                                        id="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="price"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                        biaya <span class="text-pink-500 font-bold">*</span></label>
                                                    <input type="number" name="total" id="price" min="0"
                                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        placeholder="Rp10.000" required="" />
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                                        <span class="text-pink-500 font-bold">*</span></label>
                                                    <select name="category" id="category"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option selected="" value="">Pilih category <span
                                                                class="text-pink-500 font-bold">*</span></option>
                                                        <option value="Makan">Makan</option>
                                                        <option value="Transportasi">Transportasi</option>
                                                        <option value="Jalan-Jalan">Jalan-Jalan</option>
                                                        <option value="Handpone">Handpone</option>
                                                        <option value="Peliharaan">Peliharaan</option>
                                                        <option value="Lainya">Lainya</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="desc"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan
                                                        <span class="text-pink-500 font-bold">*</span></label>
                                                    <input type="text" name="desc" placeholder="Beli bensin"
                                                        id="desc"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-pink-500 hover:bg-pink-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Tambahkan Pengeluaran
                                            </button>
                                        </form>
                                    </div>
                                    </ </div>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Tipe</th>
                                    <th scope="col" class="px-6 py-3">Kategori</th>
                                    <th scope="col" class="px-6 py-3">Total</th>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                        <td class="px-6 py-4">
                                            @if ($row->type == 'pemasukan')
                                                <span class="p-2 text-white bg-green-400 rounded-md">Pemasukan</span>
                                            @else
                                                <span class="p-2 text-white bg-red-400 rounded-md">Pengeluaran</span>
                                            @endif
                                        </td>
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $row->category }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($row->type == 'pemasukan')
                                                <span
                                                    class="p-2 font-bold text-green-400 rounded-md">+@currency($row->total)</span>
                                            @else
                                                <span
                                                    class="p-2 font-bold text-red-400 rounded-md">-@currency($row->total)</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">{{ $row->date }}</td>
                                        <td class="px-6 py-4 text-right cursor-pointer hover:bg-gray-200">
                                            <a href="{{ url('/kelola/keuangan', ['id' => $row->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

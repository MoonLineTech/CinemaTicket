@extends('.user.template')

@section('title')
    صفحه ورود
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <section class="w-full flex  h-screen bg-screen">

        <div class="z-1 relative flex flex-row justify-center text-center items-center w-full px-3">

            <div class="lg:basis-6/12 md:basis-9/12 basis-full">

                <div class="flex justify-center text-center pb-8">
                    <img src="{{ asset('images/logo.svg') }}" class="h-8 mr-3" alt="Flowbite Logo" />
                    <img src="https://cinematicket.org/v3.17.6/assets/images/typography_dark.svg"
                        class="self-center text-2xl font-semibold whitespace-nowrap light:text-black" />
                </div>

                <div class="flex justify-center text-center pb-16 w-full relative">
                    <a href="{{ route('home')}}">
                        <button type="button"
                            class="absolute right-0 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                            <i class="fa-solid fa-arrow-right ml-1"></i>
                            بازگشت
                        </button>
                    </a>
                </div>

                <div class="w-full p-6 bg-white border border-gray-100 rounded-lg shadow bg-white border-gray-100 ">

                    <div class="w-full md:flex md:flex-row px-2 block mb-8 ">

                        <div class="md:w-9/12 w-full mt-3">
                            <h1 class="flex w-full text-gray-700 font-semibold relative right-0">اگر در سینماتیکت حساب
                                کاربری ندارید، ثبت نام کنید.</h1>
                        </div>

                        <div class="md:w-3/12 w-full">
                            <a href="{{ route('user.register')}}">
                                <button type="button"
                                    class="w-full focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                    ثبت نام
                                </button>
                            </a>

                        </div>
                    </div>

                    <hr class="my-2" />


                    <div class="w-full block my-6 ">
                        <div class="md:w-9/12 w-full mt-3 ">
                            <h1 class="flex text-gray-700 font-semibold relative right-0">اگر در سینماتیکت حساب کاربری
                                دارید، وارد شوید.</h1>
                        </div>


                        <form class="md:flex block  items-center mt-5 relative w-full" method="POST" action="{{ route('user.authenticate') }}">
                            @csrf

                            <div class=" w-full flex md:basis-8/12 md:mb-0 mb-5 basis-full">

                                <input type="text" id="simple-search"
                                name="mobile"
                                    class="-mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                                    placeholder="شماره موبایل ..." required>
                            </div>

                            <div class="relative w-full flex md:basis-4/12 basis-full ">
                                <button type="submit"
                                    class=" text-center justify-center flex w-full text-white bg-gray-400 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">ورود</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

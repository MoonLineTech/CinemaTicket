@extends('.user.template_profile')

@section('title')
    بلیط های کاربر
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tickets.css') }}">
@endsection


@section('content')
    <section class="w-full  p-12 block">

        <h1 class=" w-full text-gray-700 font-semibold text-lg w-full text-right">
            بلیط های فعال
        </h1>

        <div class="w-full p-4 flex flex-row flex-wrap mt-6">


            @foreach ($tickets as $ticket )
                <div class="bg-white rounded-lg shadow-lg p-6 relative w-5/12 m-4">
                <div
                    class="absolute bottom-auto top-auto mt-16 -left-5 transform translate-y-1/2 h-8 w-8 bg-gray-200 rounded-full">
                </div>
                <div
                    class="absolute bottom-auto top-auto  mt-16 -right-5 transform translate-y-1/2 h-8 w-8 bg-gray-200 rounded-full">
                </div>
                <div class="relative z-10">

                    <div class="w-full flex flex-row">

                        <div class="w-3/12">
                            <img src="{{ url($ticket["movie"]["main_banner"]) }}" alt="" />
                        </div>

                        <div class="w-9/12 block ">

                            <div class="w-full flex flex-row relative">
                                <h1 class="text-gray-700 font-semibold text-md mx-2 text-right absolute">
                                    {{$ticket["movie"]["title"]}}
                                </h1>

                                <span
                                    class="text-left left-0 bg-gray-100 text-gray-800 text-sm mr-2 px-2.5 py-0.5 rounded absolute">
                                    <i class="fa-solid fa-ticket text-gray-800 text-sm"></i>
                                    {{convertDigitsToFarsi($ticket["count"])}} بلیت
                                </span>

                            </div>

                            <div class=" mt-10">
                                <h1 class="text-gray-700 font-normal text-sm mx-2 text-right ">
                                    <i class="fa-solid fa-location-dot text-sm text-gray-600"></i>
                                    {{$ticket["cinema_title"]}}
                                </h1>
                            </div>

                            <div class="mt-4">
                                <h1 class="text-gray-700 font-normal text-sm mx-2 text-right ">
                                    <i class="fa-solid fa-clock text-sm text-gray-600"></i>
                                       {{$ticket["sansDay"]}} ساعت {{$ticket["sansTime"]}} 
                                </h1>
                            </div>

                            <div class="w-full flex flex-row mt-6 text-red-400 ">
                                <a href="#" class="w-6/12 flex flex-row  rounded-md relative p-2 ">
                                    <div class="text-start justify-start flex flex-row w-full mt-3">
                                        <h1 class="text-black text-md font-normal = mt-1 text-red-400">کد رزرو: {{convertDigitsToFarsi($ticket["code"])}} </h1>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            


        



        </div>


    </section>
@endsection

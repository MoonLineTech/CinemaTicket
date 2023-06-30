@extends('.user.template')

@section('title')
    صفحه اصلی | سینما تیکت
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <section class="m-0 p-0" id="swiper-slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($lastMovies as $movie)
                    <div class="swiper-slide">
                        <div class="flex flex-row gap-4 bg-responsive px-6 py-8 w-full h-full z-10 blur-container" style="background-image: url({{ url($movie['second_banner']) }})">
                            <div class="blur-overlay"></div>
                            <div class="basis-3/12">
                                <img class="h-full max-w-xs rounded-lg drop-shadow-2xl shadow-lg inline-block content" src="{{ url($movie['main_banner']) }}" title="{{ $movie['title'] }}" alt="{{ $movie['title'] }}">
                            </div>
                            <div class="relative basis-9/12 px-6">
                                <h2 class="text-white text-2xl pb-8 content">{{ $movie['title'] }}</h2>
                                <h5 class="text-white text-xs content">کارگردان : {{ $movie['director'] }}</h5>
                                <div class="pt-8">
                                    <span class="text-right bg-gray-700 text-white text-sm font-medium px-2.5 pt-2 pb-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300"><i class="fa-solid fa-heart text-red-600"></i> {{ convertDigitsToFarsi('5 / '.$movie['score'] ) }}</span>
                                    <span class="text-right bg-gray-700 text-gray-50 text-sm font-medium mr-2 px-2.5 pt-2 pb-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300"><i class="fa-regular fa-clock mx-1"></i>  {{ convertDigitsToFarsi($movie['duration']) }} دقیقه </span>
                                    <span class="text-right bg-gray-700 text-gray-100 text-sm font-medium mr-2 px-2.5 pt-2 pb-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $movie->category->name }}</span>
                                </div>
                                <p class="text-white pt-10 movie-description">{{ $movie['info'] }} ...</p>
                                <a href="movie/{{ $movie['slug'] }}" class="absolute bottom-0 text-gray-900 bg-gray-50 px-6 py-2 rounded-lg text-center flex justify-center items-center">
                                    <i class="fa-solid fa-ticket-simple mx-3"></i>
                                    <span style="padding-top: 5px" class="text-center flex justify-center items-center">خرید بلیت</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                ...
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="swiper-button-next">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>
    </section>
@endsection

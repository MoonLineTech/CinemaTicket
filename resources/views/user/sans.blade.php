@extends('.user.template')

@section('title')
    انتخاب صندلی | سینما تیکت
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sans.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/sans.js') }}"></script>
@endsection

@section('content')
    <section class=" m-0 p-0 bg-gray-700 h-[100vh]">
        <nav class="flex flex-row justify-between bg-gray-800 px-2 py-3">
            <div class="basis-6/12 flex items-center pr-3">
                <img width="20%" src="{{ url('images/typography_light.svg') }}" alt="">
            </div>
            <div class="basis-6/12 flex justify-end items-center pl-3">
                <button id="dropdownProfileButton" data-dropdown-toggle="dropdownProfile"
                    class="p-2 pl-2.5 flex items-center justify-between text-sm font-medium text-gray-900 rounded-lg hover:bg-gray-700"
                    type="button">
                    <span class="sr-only"></span>
                    <img class="w-8 h-8 ml-2 rounded-full" src="{{ url('images/profile-mine.svg') }}" alt="پروفایل">
                    <span class="text-white">پروفایل</span>
                </button>

                <!-- dropdownProfile menu -->
                <div id="dropdownProfile"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-b-lg shadow-2xl origin-center mx-12 w-96 p-4 "
                    style="margin: 10px 30px !important">

                    <ul class="py-2 text-sm text-gray-700 text-gray-200 "
                        aria-labelledby="dropdownInformdropdownProfileButtonationButton">
                        <li class="p-2">
                            <a href="{{ route('user.profile') }}"
                                class="flex items-center p-4 hover:bg-gray-50 rounded-lg ">
                                <i class="fa-regular fa-pen-to-square ml-3"></i>
                                <span class="pt-1">اطلاعات کاربری</span>
                                <i class="fa-solid fa-angle-left mr-3"></i>
                            </a>
                        </li>
                        <li class="p-2">
                            <a href="{{ route('user.transaction') }}"
                                class="flex items-center p-4 hover:bg-gray-50 rounded-lg ">
                                <i class="fas fa-clipboard-check ml-3"></i>
                                <span class="pt-1">تراکنش های من</span>
                                <i class="fa-solid fa-angle-left mr-3"></i>
                            </a>
                        </li>
                        <li class="p-2">
                            <a href="{{ route('user.tickets') }}"
                                class="flex items-center p-4 hover:bg-gray-50 rounded-lg ">
                                <i class="fas fa-ticket ml-3"></i>
                                <span class="pt-1">بلیط های من</span>
                                <i class="fa-solid fa-angle-left mr-3"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2">
                        <a id="logout-btn"
                            class="cursor-pointer flex items-center p-4 text-sm text-gray-700 rounded-lg text-gray-200 hover:bg-gray-50">
                            <i class="fas fa-arrow-right-from-bracket ml-3"></i>
                            <span class="pt-1">خروج از حساب کاربری</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="scroll-dark max-h-96 bg-gray-700 px-3 pt-20 overflow-y-auto overflow-x-auto">
            <div class="w-full flex justify-center text-center">
                <div
                    class="p-1 pt-1.5 rounded-lg text-gray-300 w-8/12 border-2 boeder-gray-300 text-center overflow-x-auto">
                    <span class="inline-block min-w-full whitespace-nowrap">صحنه اجرا</span>
                </div>
            </div>
            <div class=" flex justify-center overflow-x-auto">
                <div class="mb-6 mt-6 p-1 pt-1.5  overflow-x-auto">
                    @for ($i = 1; $i <= $seats['maxRow']; $i++)
                        <div class="flex flex-row-reverse justify-center">
                            @php
                                if ($rowReserved) {
                                    $reservedSeatsForRow = [];
                                }
                                $reservedSeatsForRow = [];
                            @endphp
                            @if ($rowReserved)
                                @foreach ($rowReserved as $key => $reserved)
                                    @if ($reserved == $i)
                                        @php
                                            $reservedSeatsForRow[] = $colReserved[$key];
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                            @for ($j = 1; $j <= $seats['maxCol']; $j++)
                                @php
                                    $isReserved = in_array($j, $reservedSeatsForRow);
                                    $userIndexes = array_keys($reservedSeatsForRow, $j);
                                @endphp
                                <span data-tooltip-target="tooltip-seat{{ $i . '-' . $j }}" data-tooltip-style="light"
                                    class="cursor-pointer block m-1 w-8 h-8 rounded-full {{ $isReserved ? 'bg-gray-950 border-2 border-gray-300 pointer-events-none' : 'bg-gray-300' }}"></span>


                                <div id="tooltip-seat{{ $i . '-' . $j }}" role="tooltip"
                                    class="p-5 absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                    <div>
                                        <div class="flex justify-between mt-3">
                                            <div class="text-xs text-center w-14">
                                                <p class="text-gray-600">ردیف</p>
                                                <p>{{ convertDigitsToFarsi($i) }}</p>
                                            </div>
                                            <div class="border-[0.5px] border-gray-400"></div>
                                            <div class="text-xs text-center w-14">
                                                <p class="text-gray-600">صندلی</p>
                                                <p>{{ convertDigitsToFarsi($j) }}</p>
                                            </div>
                                        </div>
                                        <p class="mt-4 text-sm text-center">
                                            {{ convertDigitsToFarsi(number_format($sans->price)) }}</p>
                                    </div>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            @endfor
                        </div>
                        <br />
                    @endfor
                </div>
            </div>
            <div class="flex flex-wrap -mt-8 flex-row-reverse justify-center">
                @for ($k = 1; $k <= $seats['reminder']; $k++)
                    @php
                        $myIndex = -1;
                        if ($rowReserved) {
                            foreach ($rowReserved as $key => $myReserved) {
                                if ($myReserved == $seats['maxRow'] + 1) {
                                    $myIndex = $key;
                                    break;
                                }
                            }
                        }
                        
                        $isReservedRemind = $myIndex != -1 && $colReserved[$myIndex] == $k;
                    @endphp

                    <span data-tooltip-target="tooltip-seat{{ $k + $seats['maxRow'] . '-' . $j + $seats['maxCol'] }}"
                        data-tooltip-style="light"
                        class="cursor-pointer block m-1 w-8 h-8 rounded-full {{ $isReservedRemind ? 'bg-gray-950 border-2 border-gray-300' : 'bg-gray-300 border-2 border-gray-300' }}"></span>

                    <div id="tooltip-seat{{ $k + $seats['maxRow'] . '-' . $j + $seats['maxCol'] }}" role="tooltip"
                        class="p-5 absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                        <div>
                            <div class="flex justify-between mt-3">
                                <div class="text-xs text-center w-14">
                                    <p class="text-gray-600">ردیف</p>
                                    <p>{{ convertDigitsToFarsi($seats['maxRow'] + 1) }}</p>
                                </div>
                                <div class="border-[0.5px] border-gray-400"></div>
                                <div class="text-xs text-center w-14">
                                    <p class="text-gray-600">صندلی</p>
                                    <p>{{ convertDigitsToFarsi($k) }}</p>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                {{ convertDigitsToFarsi(number_format($sans->price)) }}</p>
                        </div>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="block relative bottom-0 w-full">
            <header class="bg-gray-800 text-xs text-white flex justify-between items-center py-3 px-4">
                <div class="flex jstify-between items-center">
                    <div class="flex jstify-between items-center mx-1">
                        <span class="block m-1 w-6 h-6 rounded-full bg-gray-300"></span>
                        <span>صندلی خالی</span>
                    </div>
                    <div class="flex jstify-between items-center mx-1">
                        <span class="block m-1 w-6 h-6 rounded-full bg-red-500"></span>
                        <span>انتخاب شما</span>
                    </div>
                    <div class="flex jstify-between items-center mx-1">
                        <span class="block m-1 w-6 h-6 rounded-full bg-gray-950 border-2 border-gray-300"></span>
                        <span>فروخته شده</span>
                    </div>
                </div>
                <div class="font-bold">
                    <span>ظرفیت سالن: {{ convertDigitsToFarsi($sans->capacity) }}</span>
                </div>
            </header>
            <main class="h-full w-full bg-gray-700 flex justify-between text-white py-6 px-1">
                <div class="pl-5 border-l-2 border-dashed text-xs flex pr-5 items-center w-3/12">
                    <img class="w-20 rounded-lg ml-3" src="{{ url($sans->movie[0]->main_banner) }}" alt="">
                    <div class="flex flex-col justify-between h-full mt-1 pt-3">
                        <h2 class="text-sm font-bold">{{ $sans->movie[0]->title }}</h2>
                        <p class="flex items-center">
                            <i class="fa-solid fa-location-dot ml-2"></i>
                            <span class="text-bold ml-2">{{ $sans->cinema[0]->title }}</span>
                            <span>({{ $sans->hall[0]->title }})</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fa-regular fa-clock ml-2"></i>
                            <span class="text-bold ml-2 ">{{ $time['date'] }}</span>
                            <span>- سانس {{ convertDigitsToFarsi($time['clock']) }}</span>
                        </p>
                    </div>
                </div>


                <div id="reserved" class="flex flex-wrap w-full p-0 w-6/12">
                    {{-- in here set items in jquery --}}
                </div>


                <div class="flex justify-center text-white items-center pl-3 w-3/12">
                    <div id="price-container" class="text-end text-sm">
                        <p id="total-price" class="text-start font-bold">هنوز بلیتی را انتخاب نکرده اید!</p>
                        <form method="POST" action="{{ route('sans.preFactor') }}">
                            @csrf
                            <input type="hidden" name="selected_items" id="selected-items-input">
                            <input type="hidden" name="sansSlug" value="{{ $sans['slug'] }}">

                            <button id="submit-button" type="submit "
                                class="text-center py-2 px-4 bg-gray-400 rounded-lg mt-3" disabled> ثبت صندلی و
                                نمایش
                                جزییات
                            </button>
                        </form>

                    </div>
                </div>
            </main>
        </div>
    </section>


    <script>
        $(document).ready(function() {
            var selectedItems = [];
            var sansId = {{ $sans['id'] }};
            var submitButton = $('#submit-button');

            $('span.cursor-pointer').click(function() {
                $(this).toggleClass('bg-red-500 border-2 border-gray-300');

                var row = $(this).data('tooltip-target').split('-')[1].slice(4);
                var col = $(this).data('tooltip-target').split('-')[2];

                var item = {
                    row: row,
                    col: col
                };

                if ($(this).hasClass('bg-red-500')) {
                    selectedItems.push(item);
                    addSelectedDiv(item, this);
                } else {
                    selectedItems = selectedItems.filter(function(selectedItem) {
                        return !(selectedItem.row === row && selectedItem.col === col);
                    });
                    removeSelectedDiv(item);
                }

                $('#selected-items-input').val(JSON.stringify(selectedItems));
                console.log('Selected Items:', selectedItems);
                var totalPrice = calculateTotalPrice(selectedItems);
                var totalPriceElement = $('#total-price');
                totalPriceElement.text(totalPrice + '  ' + 'تومان ');


                if (selectedItems.length > 0) {
                    submitButton.removeAttr('disabled');
                }

            });




            function calculateTotalPrice(selectedItems) {
                var totalPrice = 0;
                selectedItems.forEach(function(item) {

                    totalPrice += {{ $sans['price'] }};
                });
                return totalPrice;
            }


            function removeSelectedDiv(item) {
                $('#reserved').find('.block').each(function() {
                    var row = parseInt($(this).find('h1').text().split('.')[0].trim().split(' ')[1]);
                    var col = parseInt($(this).find('h1').text().split('.')[1].trim().split(' ')[1]);

                    if (row === parseInt(item.row) && col === parseInt(item.col)) {
                        $(this).remove();
                    }
                });
            }



            function addSelectedDiv(item, element) {
                var div = '<div class="block justify-center text-center w-1/8 mx-2 mt-2">' +
                    '<div class="flex flex-row justify-center p-4 h-12 bg-gray-600 rounded-xl items-center">' +
                    '<h1 class="text-gray-50 text-xs justify-center text-center">' +
                    'ردیف ' + item.row + ' . صندلی ' + item.col +
                    '</h1>' +
                    '</div>' +
                    '<h1 class="text-gray-50 text-xs justify-start text-start mt-2 mr-2">' +
                    '<i class="fa-solid fa-ticket ml-1"></i>' +
                    '{{ convertDigitsToFarsi($sans['price']) }} تومان' +
                    '</h1>' +
                    '</div>';

                $('#reserved').append(div);

            }


        });
    </script>


@endsection

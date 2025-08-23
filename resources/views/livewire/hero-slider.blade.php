<section class="relative w-full h-[500px]">

    <!-- Swiper container -->
    <div style="width: 100%; height: 60vh; position: relative;" class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                @php
                    $imageUrl = Str::startsWith($slide['image'], 'http')
                        ? $slide['image']
                        : asset('storage/' . $slide['image']);
                @endphp

                <div class="swiper-slide relative" style="
                    background-image: url('{!! $imageUrl !!}');
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    width: 100%;
                    height: 100%;
                ">
                    <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-start p-8 text-white">
                        @if(!empty($slide['title']))
                            <h2 class="text-3xl font-bold">{{ $slide['title'] }}</h2>
                        @endif

                        @if(!empty($slide['description']))
                            <p class="mt-2 max-w-lg">{{ $slide['description'] }}</p>
                        @endif

                        @if(!empty($slide['redirect_link']))
                            <a href="{{ $slide['redirect_link'] }}" 
                               class="mt-4 inline-block bg-white text-black px-4 py-2 rounded-lg font-semibold hover:bg-gray-200">
                                Learn More
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bottom right container with pagination & nav -->
        <div style="position: absolute;bottom: 0;left: 50%;width: 50%;height: 48px;background: rgba(0, 0, 0, 0.6);
            display: flex;align-items: center;padding: 0 16px;color: #fff;font-size: 16px;font-weight: 600;
            z-index: 30;box-sizing: border-box;">
            <!-- Pagination -->
            <div class="swiper-pagination" style="text-align: left;"></div>

            <!-- Navigation -->
            <div style="display: flex; gap: 12px; margin-left: auto;">
                <button class="swiper-button-prev-custom" style="background: #fff;width: 36px;height: 36px;
                    border: none; display: flex; align-items: center;justify-content: center; cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>
                <button class="swiper-button-next-custom" style="background: #fff;width: 36px;height: 36px;
                    border: none;display: flex;align-items: center;justify-content: center;cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        new Swiper(".mySwiper", {
            loop: true,
            slidesPerView: 1,
            pagination: {
                el: ".swiper-pagination",
                type: "custom",
                renderCustom: function (swiper, current, total) {
                    const realTotal = {{ count($slides) }};
                    let realCurrent = ((current - 1) % realTotal) + 1;
                    return `${realCurrent}/${realTotal}`;
                },
            },
            navigation: {
                nextEl: ".swiper-button-next-custom",
                prevEl: ".swiper-button-prev-custom",
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            speed: 600,
        });
    </script>
@endpush

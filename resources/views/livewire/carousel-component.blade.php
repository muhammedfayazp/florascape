<section class="relative w-full h-[500px]">


    
<!-- Swiper container -->
<div style="width: 100%; height: 60vh; position: relative;" class="swiper mySwiper">
    <div class="swiper-wrapper">
      @foreach ($slides as $slide)
        <div class="swiper-slide" style="
        background-image: url('{{ $slide['image'] }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100%;
        "></div>
      @endforeach
    </div>
    <!-- Bottom right half container -->
    <div style="position: absolute;bottom: 0;left: 50%;width: 50%;height: 48px;background: rgba(0, 0, 0, 0.6);
        display: flex;align-items: center;padding: 0 16px;color: #fff;font-size: 16px;font-weight: 600;
        z-index: 30;box-sizing: border-box;">
        <!-- Pagination -->
        <div class="swiper-pagination" style="text-align: left;"></div>
        <!-- Navigation buttons pushed to far right -->
        <div style="display: flex; gap: 12px; margin-left: auto;">
            <button class="swiper-button-prev-custom" style="background: #fff;width: 36px;height: 36px;
                border: none; display: flex; align-items: center;justify-content: center; cursor: pointer;"
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            </button>
            <button class="swiper-button-next-custom" style="background: #fff;width: 36px;height: 36px;
                border: none;display: flex;align-items: center;justify-content: center;cursor: pointer;"
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24">
                <polyline points="9 18 15 12 9 6" />
            </svg>
            </button>
        </div>
    </div>
</div>

    <div class="swiper mySwiper h-full w-full">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide relative bg-cover bg-center" style="background-image: url('{{ $slide['image'] }}');">
                    <div class="absolute inset-0 bg-black/40 z-10"></div>
                    <div class="relative z-20 flex items-center h-full px-6 md:px-20">
                        <div class="max-w-2xl text-white">
                            <h1 class="text-2xl md:text-4xl font-bold leading-tight mb-4">{{ $slide['title'] }}</h1>
                            <p class="text-sm md:text-lg mb-6">{{ $slide['description'] }}</p>
                            <a href="#" class="inline-block bg-green-600 hover:bg-green-700 transition px-5 py-3 text-white font-semibold rounded-md">
                                Get A Quote
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Arrows -->
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <!-- Include Swiper JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}

    <script>
    new Swiper(".mySwiper", {
        loop: true,
        slidesPerView: 1,
        pagination: {
        el: ".swiper-pagination",
        type: "custom",
        renderCustom: function (swiper, current, total) {
            // current and total are 1-based slide indexes including loop duplicates
            // To show real slide count ignoring loop duplicates, adjust total if needed.
            // Assuming 3 real slides here, you can hardcode or calculate total slides.
            const realTotal = 3; // replace with your actual slide count if dynamic
            // Calculate real current slide number (1 to realTotal)
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

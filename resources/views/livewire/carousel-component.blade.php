<section class="relative w-full h-[500px]">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.mySwiper', {
                loop: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
@endpush

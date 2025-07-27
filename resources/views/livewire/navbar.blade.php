<header class="bg-white shadow" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="text-xl font-bold text-indigo-600">YourBrand</a>
            </div>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-indigo-600">Home</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600">About</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600">Services</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600">Contact</a>
            </nav>

            <!-- Hamburger Icon -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden px-4 pt-2 pb-4 space-y-2 bg-white border-t">
        <a href="#" class="block text-gray-700 hover:text-indigo-600">Home</a>
        <a href="#" class="block text-gray-700 hover:text-indigo-600">About</a>
        <a href="#" class="block text-gray-700 hover:text-indigo-600">Services</a>
        <a href="#" class="block text-gray-700 hover:text-indigo-600">Contact</a>
    </div>
</header>

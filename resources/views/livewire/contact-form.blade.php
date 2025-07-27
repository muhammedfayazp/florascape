<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input wire:model="name" type="text" class="w-full border rounded px-3 py-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input wire:model="email" type="email" class="w-full border rounded px-3 py-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1">Message</label>
            <textarea wire:model="message" class="w-full border rounded px-3 py-2"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Send</button>
    </form>
</div>

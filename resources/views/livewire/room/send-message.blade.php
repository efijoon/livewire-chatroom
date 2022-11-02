<div>
    <form wire:submit.prevent="send" class="flex items-start space-x-3">
    <textarea wire:model.defer="message" class="rounded-md p-2 shadow-sm border-gray-300 w-full"
              placeholder="Your Message" rows="2" widht="100%"></textarea>
        <button type="submit" class="bg-blue-500 text-white rounded p-2 px-4">send</button>
    </form>

    @error('message') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

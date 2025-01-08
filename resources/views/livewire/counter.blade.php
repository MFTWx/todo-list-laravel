<div class="max-w-4xl mx-auto mt-10 p-6 bg-transparent border border-custom3 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-custom4">Create a Todo</h2>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <input type="text" id="title" wire:model.live="title" placeholder="Title"
                maxlength="{{ $maxTitleLength }}"
                class="w-full px-3 py-2 border border-custom3 rounded-md focus:outline-none focus:ring focus:border-custom3 bg-custom2 text-custom4 shadow-sm">
            <p class="text-custom4 mt-2">Remaining characters: {{ $maxTitleLength - strlen($title) }}</p>
        </div>
        <div class="mb-4">
            <input type="text" id="description" wire:model.live="description" placeholder="Description"
                maxlength="{{ $maxDescriptionLength }}"
                class="w-full px-3 py-2 border border-custom3 rounded-md focus:outline-none focus:ring focus:border-custom3 bg-custom2 text-custom4 shadow-sm">
            <p class="text-custom4 mt-2">Remaining characters: {{ $maxDescriptionLength - strlen($description) }}</p>
        </div>
        <div class="mb-4">
            <label for="completed" class="inline-flex items-center">
                <input type="checkbox" id="completed" wire:model = "completed" class="form-checkbox h-5 w-5 text-custom3">
                <span class="ml-2 text-custom4">Completed</span>
            </label>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 border border-custom3 text-custom4 rounded-md bg-custom2 hover:bg-custom3 focus:outline-none focus:ring focus:border-custom3 shadow-md transform transition duration-500 ease-in-out hover:scale-105">Create Todo</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
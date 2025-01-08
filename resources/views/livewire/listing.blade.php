<div>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-transparent border border-custom3 rounded-lg shadow-lg overflow-hidden">
        <h2 class="text-2xl font-bold mb-6 text-custom4">Uncomplete Todos</h2>
        @if ($incompleteTodos->isNotEmpty())
        <div class="max-h-64 overflow-y-auto space-y-4">
            @foreach ($incompleteTodos as $todo)
            <div class="flex items-center justify-between p-4 bg-custom2 border border-custom3 rounded-lg">
                <div>
                    <h3 class="text-xl font-semibold text-custom4">{{ $todo->title }}</h3>
                    <p class="text-custom4">{{ $todo->description }}</p>
                </div>
                <div class="flex space-x-2">
                    <button wire:click="markAsCompleted({{ $todo->id }})"
                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
                        <i class="fas fa-check"></i>
                    </button>
                    <button wire:click="editTodo({{ $todo->id }})"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button wire:click="deleteTodo({{ $todo->id }})"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h1 class="text-custom4">No data</h1>
        @endif
    </div>

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-transparent border border-custom3 rounded-lg shadow-lg overflow-hidden">
        <h2 class="text-2xl font-bold mb-6 text-custom4">Completed Todos</h2>
        @if ($completedTodos->isNotEmpty())
        <div class="max-h-64 overflow-y-auto space-y-4">
            @foreach ($completedTodos as $todo)
            <div class="flex items-center justify-between p-4 bg-custom2 border border-custom3 rounded-lg">
                <div>
                    <h3 class="text-xl font-semibold text-custom4">{{ $todo->title }}</h3>
                    <p class="text-custom4">{{ $todo->description }}</p>
                </div>
                <div class="flex space-x-2">
                    <button wire:click="undoCompleted({{ $todo->id }})"
                        class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:border-green-300">
                        <i class="fa-solid fa-rotate-left"></i>
                    </button>
                    <button wire:click="editTodo({{ $todo->id }})"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button wire:click="deleteTodo({{ $todo->id }})"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h1 class="text-custom4">No data</h1>
        @endif
    </div>
</div>
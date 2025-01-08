<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Listing extends Component
{
    public $incompleteTodos;
    public $completedTodos;

    protected $listeners = ['todoAdded' => 'refreshTodos'];

    public function mount()
    {
        $this->refreshTodos();
    }

    public function refreshTodos()
    {
        $this->incompleteTodos = Todo::where('completed', false)
                                     ->orderBy('updated_at', 'desc')
                                     ->get();

        $this->completedTodos = Todo::where('completed', true)
                                    ->orderBy('updated_at', 'desc')
                                    ->get();
    }

    public function markAsCompleted($todoId)
    {
        $todo = Todo::find($todoId);
        if ($todo) {
            $todo->update([
                'completed' => true,
                'updated_at' => now(),
            ]);
        }
        $this->refreshTodos();
    }

    public function undoCompleted($todoId)
    {
        $todo = Todo::find($todoId);
        if ($todo) {
            $todo->update([
                'completed' => false,
                'updated_at' => now(),
            ]);
        }
        $this->refreshTodos();
    }

    public function editTodo($todoId)
    {
        // Handle the edit action
    }

    public function deleteTodo($todoId)
    {
        Todo::destroy($todoId);
        $this->refreshTodos();
    }

    public function render()
    {
        return view('livewire.listing');
    }
}

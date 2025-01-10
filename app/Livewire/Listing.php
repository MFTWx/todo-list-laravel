<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Listing extends Component
{
    public $incompleteTodos;
    public $completedTodos;
    public $editTodoId = null;
    public $editTitle = '';
    public $editDescription = '';

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
        $todo = Todo::find($todoId);
        if ($todo) {
            $this->editTodoId = $todoId;
            $this->editTitle = $todo->title;
            $this->editDescription = $todo->description;
        } 
    }

    public function cancelEdit()
    {
        $this->editTodoId = null;
        $this->editTitle = '';
        $this->editDescription = '';
    }

    public function updateTodo()
    {
        $todo = Todo::find($this->editTodoId);
        if ($todo) {
            if ($this->editTitle == '') {
                $this->editTitle = $todo->title;
            } else if($this->editDescription == '') {
                $this->editDescription = "No description";
            }

            $todo->update([
                'title' => $this->editTitle,
                'description' => $this->editDescription,
                'updated_at' => now(),
            ]);
        }
        $this->cancelEdit();
        $this->refreshTodos();
    }

    public function deleteTodo($todoId)
    {
        Todo::find($todoId)->delete();
        $this->refreshTodos();
    }

    public function render()
    {
        return view('livewire.listing');
    }
}

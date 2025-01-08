<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Counter extends Component
{
    public $title = '';
    public $description = '';
    public $maxTitleLength = 20;
    public $maxDescriptionLength = 50;
    public $completed = '';

    protected $rules = [
        'title' => 'required|max:20',
        'description' => 'max:50',
    ];
    

    protected $message = [
        'title.required' => 'The title field is required',
        'title.max' => 'The title field must be less than 20 characters',
        'description.max' => 'The description field must be less than 50 characters',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
        
        $description = $this->description ? $this->description : "No description";
        $completed = $this->completed == 'on' ? true : false;

        Todo::create([
            'title' => $this->title,
            'description' => $description,
            'completed' => $completed,
        ]);

        $this->resetInputFields();
        //$this->emitTo('listing', 'todoAdded');
        $this->dispatch('todoAdded')->to('listing');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->completed = false;
    }

    public function render()
    {
        return view('livewire.counter');
    }

}

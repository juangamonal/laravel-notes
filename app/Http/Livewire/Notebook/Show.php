<?php

namespace App\Http\Livewire\Notebook;

use App\Models\Notebook;
use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{
    public $creatingNotebook = false;
    public $notebooks;
    public $searchBy;

    public $notebookName;
    public $submit = false;

    public function render()
    {
        return view('livewire.notebook.show');
    }

    public function search()
    {
        if (!is_null($this->searchBy) && $this->searchBy !== '') {
            $this->notebooks = Notebook::where('name', 'like', "%{$this->searchBy}%")->get();
        } else {
            $this->reload();
        }
    }

    public function createNotebook()
    {
        $this->submit = true;

        Notebook::create([
            'name' => $this->notebookName,
            'user_id' => auth()->id(),
            'code' => Str::random(50)
        ]);

        $this->creatingNotebook = false;
        $this->notebookName = null;
        $this->submit = false;

        $this->reload();
    }

    private function reload()
    {
        $this->notebooks = Notebook::get();
    }
}

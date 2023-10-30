<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thought;
class Thoughts extends Component
{
    public $pensa = '';


    public function render()
    {
        $this->reset();
        return view('livewire.thoughts', [
            'thoughts' => Thought::where('user_id', auth()->id())->get(),
        ]);

    }
    public $rules = [
        'pensa' => 'required|max:500',
    ];
    public function save()
    {
        $this->validate();
        Thought::create([
            'pensamiento' => $this->pensa,
            'user_id' => auth()->id(),

        ]);
        $this->reset();
    }

    public function delete($thoughtId){
        $thought = Thought::where('id', $thoughtId)->where('user_id', auth()->id())->first();

        if ($thought) {
            $thought->delete();
        }
    }

    public function update($thoughtId, $newThought){
        $thought = Thought::where('id', $thoughtId)->where('user_id', auth()->id())->first();

        if ($thought) {
            $thought->update([
                'pensamiento' => $newThought
            ]);
        }

    }

}

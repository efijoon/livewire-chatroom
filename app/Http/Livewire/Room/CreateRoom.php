<?php

namespace App\Http\Livewire\Room;

use App\Events\RoomAdded;
use App\Models\Room;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateRoom extends Component
{
    public $name;

    public function rules()
    {
        return [
            'name' => 'required|min:2'
        ];
    }

    public function create()
    {
        $data = $this->validate();

        if(Room::whereSlug(Str::slug($this->name))->count())
            return $this->addError('name', 'The name has already been taken.');

        auth()->user()->rooms()->create([
            'name' => $data['name'],
            'slug' => Str::slug($this->name)
        ]);

        $this->emit('room.added');
        broadcast(new RoomAdded())->toOthers();

        $this->name = '';
    }

    public function render()
    {
        return view('livewire.room.create-room');
    }
}

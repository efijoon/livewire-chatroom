<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'room.added' => '$refresh',
        'room.removed' => '$refresh',
        'echo-private:room.added,RoomAdded' => '$refresh'
    ];

    public function destroy(Room $room)
    {
        $room->delete();

        $this->emitSelf('room.removed');
    }

    public function render()
    {
        $rooms = Room::latest()->get();

        return view('livewire.room.index', compact('rooms'));
    }
}

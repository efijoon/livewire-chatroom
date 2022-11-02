<?php

namespace App\Http\Livewire\Room;

use App\Events\RoomAdded;
use App\Models\Room;
use Livewire\Component;

class SendMessage extends Component
{
    public $message;
    public Room $room;

    protected $rules = [
        'message' => 'required|string'
    ];

    public function send()
    {
        $this->validate();

        $newMessage = $this->room->messages()->create([
            'text' => $this->message,
            'user_id' => auth()->user()->id
        ]);

        $this->emitTo('room.messages', 'message.send', $newMessage->id);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.room.send-message');
    }
}

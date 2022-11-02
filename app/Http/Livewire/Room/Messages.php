<?php

namespace App\Http\Livewire\Room;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
    public $messages;

    protected $listeners = [
      'message.send' => 'appendMessage'
    ];

    public function appendMessage(Message $message)
    {
        $this->messages->prepend($message);
    }

    public function render()
    {
        return view('livewire.room.messages');
    }
}

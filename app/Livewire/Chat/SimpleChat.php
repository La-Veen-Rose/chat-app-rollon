<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SimpleChat extends Component
{
    public string $message = '';
    public $selectedUserId = null;

    protected $rules = [
        'message' => 'required|string|max:1000',
        'selectedUserId' => 'required|exists:users,id',
    ];

    public function send()
    {
        $this->validate();

        Message::create([
            'user_id' => Auth::id(),
            'recipient_id' => $this->selectedUserId,
            'body' => $this->message,
        ]);

        $this->message = '';
    }

    public function getMessagesProperty()
    {
        if (!$this->selectedUserId) return collect();

        return Message::with('user')
            ->where(function ($q) {
                $q->where('user_id', Auth::id())
                  ->where('recipient_id', $this->selectedUserId);
            })
            ->orWhere(function ($q) {
                $q->where('user_id', $this->selectedUserId)
                  ->where('recipient_id', Auth::id());
            })
            ->orderBy('created_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.chat.simple-chat', [
            'users' => User::where('id', '!=', Auth::id())->get(),
        ]);
    }

    public function selectUser($userId)
{
    $this->selectedUserId = $userId;
    // The component will automatically re-render after this property is changed.
}

}

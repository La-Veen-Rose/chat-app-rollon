<div
    x-data="{ scrollToBottom() { this.$nextTick(() => { const box = this.$refs.box; box.scrollTop = box.scrollHeight; }); } }"
    x-on:scrolled.window="scrollToBottom()"
    class="flex h-full"
>
    <div class="w-1/4 border-r pr-4">
        <h2 class="font-bold mb-2">Users</h2>
        <ul>
            @foreach ($users as $user)
                <li>
                    <button 
                        wire:click="selectUser({{ $user->id }})"
                        class="flex items-center w-full text-left px-2 py-1 rounded {{ $selectedUserId == $user->id ? 'bg-blue-100' : '' }} hover:bg-blue-100"
                    >
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-8 h-8 rounded-full mr-2" alt="Profile Photo">
                        @else
                            <div class="w-8 h-8 rounded-full bg-gray-300 mr-2"></div>
                        @endif
                        <span>{{ $user->name }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    
    <div class="flex-1 flex flex-col h-full max-h-[80vh] bg-white rounded-2xl shadow p-4">
        @if($selectedUserId)
            {{-- Messages --}}
            <div
                x-ref="box"
                wire:poll.1s
                class="flex-1 overflow-y-auto space-y-3 pr-2"
            >
                @foreach ($this->messages as $msg)
                    <div class="flex {{ $msg->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[75%] rounded-2xl px-4 py-2
                            {{ $msg->user_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-800' }}">
                            <div class="text-xs opacity-70 mb-1">
                                {{ $msg->user->name }} • {{ $msg->created_at->diffForHumans() }}
                            </div>
                            <div class="whitespace-pre-wrap break-words">{{ $msg->body }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Input --}}
            <form wire:submit.prevent="send" class="mt-4 flex gap-2">
                <input
                    type="text"
                    wire:model.defer="message"
                    placeholder="Type a message…"
                    class="flex-1 border rounded-xl px-4 py-2 focus:outline-none focus:ring w-full"
                >
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 disabled:opacity-50"
                    @disabled(!strlen($message ?? ''))
                >
                    Send
                </button>
            </form>
        @else
            <div class="flex-1 flex items-center justify-center text-gray-400">
                Select a user to start chatting.
            </div>
        @endif
    </div>
</div>
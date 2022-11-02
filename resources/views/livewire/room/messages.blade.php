<div>
    @if($messages->count())
        <div class="divide-y space-y-2 overflow-y-scroll" style="max-height: 500px;">
            @foreach($messages as $message)
                <div class="pt-2">
                    <div>
                        <span class="font-bold border-r border-gray-200 pr-2 mr-1">{{ $message->user->name }}</span>
                        <span class="text-gray-400 text-sm">
                            {{ \Carbon\Carbon::parse($message->created_at)->timezone('Asia/Tehran')->format('Y/m/d - H:i') }}
                        </span>
                    </div>
                    <p>
                        {{ $message->text }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-gray-400">
            Waiting For First Message
        </div>
    @endif
</div>

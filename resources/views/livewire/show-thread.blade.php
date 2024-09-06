<div class="mx-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="rounded-md mb-4 dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-900" >
        <div class="p-4 flex gap-4" >
            <div>
                <img class="rounded-md" src="{{ $thread->user->avatar() }}}" alt="{{ $thread->user->name }}" />
            </div>
            <div class="w-full">
                <h2 class="mb-4 flex items-start justify-between">
                    <a href="{{ route('show.thread',$thread) }}" class="text-xl font-semibold dark:text-white/90" >
                        {{ $thread->title }}
                    </a>
                    <span
                        class="rounded-full text-xs py-2 px-4 capitalize"
                        style="color: {{ $thread->category->color }};border: 1px solid {{ $thread->category->color }}"
                    >
                        {{ $thread->category->name }}
                    </span>
                </h2>
                <p class="mb-4 dark:text-blue-600 font-semibold text-xs">
                    {{ $thread->user->name }}
                    <span class="dark:text-white/90" >
                        {{$thread->created_at->diffForHumans()}}
                    </span>
                </p>
                <p class="dark:text-white/60">
                    {{ $thread->body }}
                </p>
            </div>
        </div>
    </div>
    @foreach($replies as $reply)
{{--        @livewire('show-reply',['reply'=>$reply],key('reply-'.$reply->id))--}}
        <livewire:show-reply :$reply  :key="'reply-'.$reply->id" />
    @endforeach

    <form
        wire:submit.prevent="postReply" class="mb-4"
    >
        <input
            type="text"
            placeholder="{{__('replies.placeholder')}}"
            class="border-0 rounded-md w-1/3 p-3 dark:text-white/60 text-xs dark:bg-slate-800"
            wire:model.live="body"
        >
    </form>
</div>

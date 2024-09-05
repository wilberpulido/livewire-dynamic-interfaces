<div>
    <div class="rounded-md mb-4 dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-900 dark:hover:to-slate-800" >
        <div class="p-4 flex gap-4" >
            <div>
                <img class="rounded-md" src="{{ $reply->user->avatar() }}}" alt="{{ $reply->user->name }}" />
            </div>
            <div class="w-full">
                <p class="mb-2 dark:text-blue-600 font-semibold text-xs">
                    {{ $reply->user->name }}
                </p>
                @if($is_editing)
                    <form
                        wire:submit.prevent="updateReply" class="m-4"
                    >
                        <input
                            type="text"
                            placeholder="{{__('replies.placeholder')}}"
                            class="border-1 rounded-md w-1/3 dark:border-slate-900 p-3 dark:text-white/60 text-xs dark:bg-slate-800"
{{--                            lvwr v2 si agregas la funcion updatedIsEditing --}}
{{--                            wire:model="body"--}}
                            lvwr v3
                            value="{{$reply->body}}"
                            wire:model.fill="body"
                        >
                    </form>
                @else
                    <p class="text-xs dark:text-white/60">
                        {{ $reply->body }}
                    </p>
                @endif
                @if($is_creating)
                    <form
                        wire:submit.prevent="postReply" class="m-4"
                    >
                        <input
                            type="text"
                            placeholder="{{__('replies.placeholder')}}"
                            class="border-1 rounded-md w-1/3 dark:border-slate-900 p-3 dark:text-white/60 text-xs dark:bg-slate-800"
                            wire:model="body"
                        >
                    </form>
                @endif
                <p class="mt-4 text-xs flex gap-2 justify-end dark:text-white/60 " >
                    @if(is_null($this->reply->reply_id))
                    <a href="" wire:click.prevent="$toggle('is_creating')" class="dark:hover:text-white">
                        {{__('replies.singular_title')}}
                    </a>
                    @endif
                    @can('update',$reply)
                    <a href="" wire:click.prevent="$toggle('is_editing')" class="dark:hover:text-white">
                        {{__('common.edit')}}
                    </a>
                    @endcan
                </p>
            </div>
        </div>
    </div>
    @foreach($reply->replies as $reply)
        {{--        @livewire('show-reply',['reply'=>$reply],key('reply-'.$reply->id))--}}
        <div class="ml-8">
            <livewire:show-reply :$reply  :key="'reply-'.$reply->id" />
        </div>

    @endforeach
</div>

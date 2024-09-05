<div class="mx-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class="w-64">
        <a href="" class="block w-full py-4 mb-10  font-bold text-xs text-center rounded-md capitalize dark:bg-gradient-to-r dark:from-blue-600 dark:to-blue-700 dark:hover:to-blue-600 dark:text-white/90" >
            {{__('threads.show.ask') }}
        </a>
        <ul>
            @foreach($categories as $category)
                <li class="mb-2">
                    <a href="" wire:click.prevent="setFilterByCategoryId('{{ $category->id }}')"  class="p-2 rounded-md flex items-center gap-2 font-semibold text-xs capitalize dark:bg-slate-800 dark:text-white dark:hover:text-white/60 " >
                    <span class="w-2 h-2 rounded-full" style="background-color: {{$category->color}}">
                    </span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
            <li class="mb-2">
                <a href="" wire:click.prevent="setFilterByCategoryId('')" class="p-2 rounded-md flex items-center gap-2 font-semibold text-xs capitalize dark:bg-slate-800 dark:text-white dark:hover:text-white/60 " >
                    <span class="w-2 h-2 rounded-full" style="background-color: #000">
                    </span>
                    {{ __('threads.show.all_results') }}
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full" >
        <form class="mb-4">
            <input
                type="text"
                placeholder="Search"
                class="border-0 rounded-md w-1/3 p-3 dark:text-white/60 text-xs dark:bg-slate-800"
                wire:model.live.debounce.200ms="search"
            >
        </form>
        @foreach($threads as $thread)
            <div class="rounded-md mb-4 dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-900 dark:hover:to-slate-00 " >
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
                        <p class="flex items-center justify-between w-full text-xs">
                            <span class="dark:text-blue-600 font-semibold">
                                {{ $thread->user->name }}
                                <span class="dark:text-white/90" >
                                    {{$thread->created_at->diffForHumans()}}
                                </span>
                            </span>
                            <span class="flex items-center gap-1 capitalize dark:text-slate-700">
                                <svg class="h-4 size-6"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97Z" clip-rule="evenodd" />
                                </svg>
                                {{ $thread->replies_count }}
                                @if( $thread->replies_count === 1 )
                                    {{__('replies.singular_title')}}
                                @else
                                    {{__('replies.title')}}
                                @endif
                                <a href="" class="dark:hover:text-white">
                                    {{__('common.edit')}}
                                </a>
                            </span>

                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

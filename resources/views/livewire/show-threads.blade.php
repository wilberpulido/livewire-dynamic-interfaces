<div class="mx-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class="w-64">
        <a href="" class="block w-full py-4 mb-10  font-bold text-xs text-center rounded-md capitalize dark:bg-gradient-to-r dark:from-blue-600 dark:to-blue-700 dark:hover:to-blue-600 dark:text-white/90" >
            {{__('threads.show.ask') }}
        </a>
        <ul>
            @foreach($categories as $category)
                <li class="mb-2">
                    <a href="" class="p-2 rounded-md flex items-center gap-2 font-semibold text-xs capitalize dark:bg-slate-800 dark:text-white dark:hover:text-white/60 " >
                    <span class="w-2 h-2 rounded-full" style="background-color: {{$category->color}}">
                    </span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
            <li class="mb-2">
                <a href="" class="p-2 rounded-md flex items-center gap-2 font-semibold text-xs capitalize dark:bg-slate-800 dark:text-white dark:hover:text-white/60 " >
                    <span class="w-2 h-2 rounded-full" style="background-color: #000">
                    </span>
                    {{ __('threads.show.all_results') }}
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full" >
    {{--        Form--}}
        @foreach($threads as $thread)
            <div class="rounded-md mb-4 dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-900 dark:hover:to-slate-00 " >
                <div class="p-4 flex gap-4" >
                    <div>Image, avatar</div>
                    <div class="w-full">
                        <h2 class="mb-4 flex items-start justify-between">
                            <a href="" class="text-xl font-semibold dark:text-white/90" >
                                {{ $thread->title }}
                            </a>
                            <span
                                class="rounded-full text-xs py-2 px-4 capitalize"
                                style="color: #00aced;border: 1px solid #00aced"
                            >
                                Categoria
                            </span>
                        </h2>
                        <p class="flex items-center justify-between w-full text-xs">
                            <span class="dark:text-blue-600 font-semibold">
                                Usuario
                                <span class="dark:text-white/90" >
                                    {{$thread->created_at->diffForHumans()}}
                                </span>
                            </span>
                            <span class="dark:text-slate-700">
                                Respuestas y boton
                            </span>

                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

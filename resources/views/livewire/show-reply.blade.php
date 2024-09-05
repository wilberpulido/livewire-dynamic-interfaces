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
                <p class="text-xs dark:text-white/60">
                    {{ $reply->body }}
                </p>
                <p class="mt-4 text-xs flex gap-2 justify-end dark:text-white/60 " >
                    <a href="" class="dark:hover:text-white">
                        {{__('replies.singular_title')}}
                    </a>
                    <a href="" class="dark:hover:text-white">
                        {{__('common.edit')}}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

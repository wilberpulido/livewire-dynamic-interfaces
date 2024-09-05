<x-app-layout>
    <div class="mx-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="rounded-md mb-4 dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-900" >
            <div class="p-4" >
                <h2 class="mb-4 text-xl font-semibold dark:text-white/90 ">
                    {{__('threads.edit')}}
                </h2>
                <form action="{{route('threads.update',$thread)}}" method="POST" >
                    @csrf
                    @method('PUT')

                    @include('thread.form')
                    <input
                        type="submit"
                        value="{{__('threads.edit')}}"
                        class="w-full py-4 font-bold text-xs text-center rounded-md capitalize dark:bg-gradient-to-r dark:from-blue-600 dark:to-blue-700 dark:hover:to-blue-600 dark:text-white/90"
                    >
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

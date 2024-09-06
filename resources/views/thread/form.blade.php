<div>
    <select
        name="category_id"
        class="border-1 rounded-md text-xs w-full p-3 capitalize mb-4 dark:text-white/60 dark:bg-slate-800 dark:border-slate-900"
    >
        <option value=""> Seleccionar categoría </option>
        @foreach($categories as $category)
            <option
                value="{{$category->id}}"
                @if(!empty(old('category_id')) ? old('category_id') == $category->id:$thread->category_id == $category->id)
                    selected
                @endif
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <input
        type="text"
        name="title"
        class="border-1 rounded-md text-xs w-full p-3 capitalize mb-4 dark:text-white/60 dark:bg-slate-800 dark:border-slate-900"
        value="{{old('title',$thread->title) }}"
    >
    <textarea
        name="body"
        rows="10"
        placeholder="Descripción del problema"
        class="border-1 rounded-md text-xs w-full p-3 capitalize mb-4 dark:text-white/60 dark:bg-slate-800 dark:border-slate-900"
    >{{old('body',$thread->body) }}</textarea>
</div>

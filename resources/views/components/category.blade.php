<div class="flex items-center">
    @if($category->isChild())
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-0 h-5 w-5 rotate-20" viewBox="0 0 20 20" fill="currentColor">
            --
        </svg>
    @endif
    <div class="bg-white px-8 py-4 rounded shadow flex-1">{{ $category->id }}</div>
</div>

<x-categories :categories="$category->children" />
<div class="flex items-center">
    @if($category->isChild())
       SUB
    @endif
    <div class="">{{ $category->id }}</div>
</div>

<x-categories :categories="$category->children" />
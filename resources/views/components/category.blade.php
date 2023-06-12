 <option>
    @if($category->isChild())
       SUB
    @endif
     {{ $category->id }} 
 </option> 

<x-categories :categories="$category->children" />
 @foreach ($childs as $child)
     {{ $child->id }}

     @if (count($child->_children))
         <x-backend.cms.manageChild :childs="$child->_children" />
     @endif
 @endforeach

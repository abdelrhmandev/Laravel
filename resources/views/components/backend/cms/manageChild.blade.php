<ul>
    @foreach($childs as $child)


<li>

    <i>{{ $child->translate->title }} 

@if(count($child->_children))

   

        <x-backend.cms.manageChild :childs="$child->_children" />


    @endif

</li>


    
@endforeach

</ul>
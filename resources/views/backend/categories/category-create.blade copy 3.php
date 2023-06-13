@extends('backend.base.base')

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">Recipes</li>
    <li class="breadcrumb-item text-dark">Listings</li>
@stop

@section('style')

 


    @if (app()->getLocale() === 'ar')
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
    @else
        <link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
            type="text/css" />
    @endif

<style>

.tree, .tree ul {

margin:0;

padding:0;

list-style:none

}

.tree ul {

margin-left:1em;

position:relative

}

.tree ul ul {

margin-left:.5em

}

.tree ul:before {

content:"";

display:block;

width:0;

position:absolute;

top:0;

bottom:0;

left:0;

border-left:1px solid

}

.tree li {

margin:0;

padding:0 1em;

line-height:2em;

color:#369;

font-weight:700;

position:relative

}

.tree ul li:before {

content:"";

display:block;

width:10px;

height:0;

border-top:1px solid;

margin-top:-1px;

position:absolute;

top:1em;

left:0

}

.tree ul li:last-child:before {

background:#fff;

height:auto;

top:1em;

bottom:0

}

.indicator {

margin-right:5px;

}

.tree li a {

text-decoration: none;

color:#369;

}

.tree li button, .tree li button:active, .tree li button:focus {

text-decoration: none;

color:#369;

border:none;

background:transparent;

margin:0px 0px 0px 0px;

padding:0px 0px 0px 0px;

outline: 0;

}

</style>

 
@stop




@section('content')

    <div class="container-xxl" id="kt_content_container">

       

        <select id="tree1">
            @php $level = 0 ;@endphp
            @foreach($categories as $category)

                <option>

                    {{ $category->id }}

                    @if ($category->children->isNotEmpty())


                    <x-category :childs="$category->children" : level="{{ $level+1 }}" />
 

                    @endif

                    </option>

            @endforeach

            </select>

        
      
    </div>
@stop








@section('scripts')

 
 

  
 
 


    {{-- @include('backend.form') --}}
@stop

@foreach ($categories as $category)
<option value="{{ $category->id }}">{{$dashes}}{{ $category->id }}</option>
@if(count($category->children))
@php $newDashes = $dashes . '--' @endphp 
@include('partials.hirearchy', ['categories'=>$category->children, 'dashes'=>$newDashes])
@endif
@endforeach
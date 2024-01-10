@extends('backend.base.base')
@section('title', __($trans . '.plural'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted"><a href="{{ route(config('custom.route_prefix').'.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
    <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
    <li class="breadcrumb-item text-dark">{{ __($trans . '.plural') }}</li>
</ul>
@stop
@section('content')
<div class="container-xxl" id="kt_content_container">
  
<div><a href="{{ route('recipes.create')}}">Add New Recipe</a></div>

<table cellpading="5" cellspacing="15" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Category</th>
        <th>cook[minutes]</th>
        <th>servings[persons]</th>        
        <th>Likes</th>
        <th>Dislikes</th>  
        <th>Tags</th>
        <th>Reviews</th>
        <th>Actions</th>
 
      </tr>
    </thead>
    <tbody>
        @forelse ($rows as $row)        
      <tr>
        <td>{{ $row->id }}
        @if($row->image)

        {{-- https://preview.keenthemes.com/metronic8/demo9/apps/ecommerce/catalog/products.html --}}
        
        <a target="_new" href="{{ asset("storage/".$row->image) }}">

         {{-- {{ $row->image  }} --}}


 <img src="{{ asset("storage/".$row->image) }}" width="50">
                </a>
          @endif
        </td>
        <td>
       
          {{ $row->translate->title }}
        </td>         
 

      
        
      

        <td>{{ $row->category->translate->title ?? '-' }} </td>
        



        <td>{{ $row->cook ?? '-' }}</td>

        <td>{{ $row->servings ?? '-' }}</td>


      <td>{{ $row->likes_count ?? '-' }}  </td>

      <td>{{ $row->dislikes_count ?? '-'}}  </td>


      <td>
 @forelse ($row->tags as $tag)
      <a href="#" class="btn btn-primary">{{$tag->translate->title }}</a>
      @empty
      - 
      @endforelse  
  
        </td>
        <td>
           @if($row->reviews_count)
          <a href="#">{{ $row->reviews_count }}</a>
          @else
          -
          @endif 
        </td>

       
 
    <td>

             {{ $row->created_at->toDayDateTimeString() }} 

            {{ \Carbon\Carbon::parse($row->created_at)->format('Y/m/d').' | '.$row->created_at->diffForHumans(); }}  


              <form action="{{ route('recipes.destroy',$row->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('recipes.edit',$row->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>             
    </td> 
    </tr>
      @empty
      @include('backend.includes.empty',['msg'=>trans('area.no_aras_added')])
      
      @endforelse

    </tbody>
  </table>

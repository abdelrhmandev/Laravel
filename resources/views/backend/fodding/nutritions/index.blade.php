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
<div class="container-xxl" id="kt_content_container"><table cellpading="5" cellspacing="5" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
 
  
 
        {{-- <th>Users has Reviewed</th> --}}
      </tr>
    </thead>
    <tbody>
        @forelse ($nutritions  as $nutrition)        
      <tr>
        <td>{{ $nutrition->id }}</td>
        <td>{{ $nutrition->nutrition->title }}</td>         
 
        <td><a href="{{ route('nutritions.edit',$nutrition->id) }}"> Edit</a></td>

        <td><a href="{{ route('nutritions.destroy',$nutrition->id) }}"> delete</a></td>

    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>

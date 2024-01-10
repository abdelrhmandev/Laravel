@extends('layouts.admin')
@section('content')
<div>
 {{-- <form method="POST" action="{{ route('recipes.update',$row->id)}}" enctype="multipart/form-data">
  @csrf
  @method('PUT') --}}

 

{{-- <img src="{{ asset("storage/".$row->image) }}" width="50"> --}}
 
{{--  
<p> cook  : {{ $row->cook }} </p>  
<p> servings  : {{ $row->servings }}</p> 
<p> featured  : {{ $row->featured }} </p>  
<p> created_at  : {{ $row->created_at }} </p> --}}


{{-- @include('backend.partials.title') --}}


{{-- @include('backend.partials.likes',['likes'=>$row->likes,'counter'=>$row->likes->count()]) --}}

{{-- @include('backend.partials.dislikes',['dislikes'=>$row->dislikes,'counter'=>$row->dislikes->count()]) --}}




  @include ('backend.partials.comments.list', ['collection' => $comments['root']])  


    {{-- https://www.youtube.com/watch?v=wCfKSpIMVpY --}}
 

    {{-- {{ $counter}} --}}
 


 
{{-- {{ $counter}} --}}



 
 
 
</div>
  
{{-- @endforeach  --}}





<br><br><br>

<h1><input type="submit" value="UPDATE"></h1>

</form>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $("#selectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","selected");
        $("#selectall-tag").trigger("change");
    });
    $("#deselectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","");
        $("#selectall-tag").trigger("change");
    });

    $(document).ready(function () {
        $('.select2').select2();
    });
   
        $('document').ready(function () {
            $('.nutrition-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.nutrition-value[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.nutrition-value[data-id="' + id + '"]').val(null)
            })
        });
    </script>

@stop
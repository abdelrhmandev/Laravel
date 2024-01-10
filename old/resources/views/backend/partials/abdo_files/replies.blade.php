{{-- {{ $counter}} --}}
@foreach($replies as $reply)
<div class="display-comment" @if($reply->parent_id != null) style="margin-left:40px;" @endif>

  
    {{-- <strong>{{ $reply->user->name }}</strong> --}}
    <p>{{ $reply->comment }}</p>


    {{-- <a href="" id="reply"></a>
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <input type="text" name="repl" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $row->id }}" />
            <input type="hidden" name="repl_id" value="{{ $reply->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form> --}}

 
 
  </div>
@endforeach 
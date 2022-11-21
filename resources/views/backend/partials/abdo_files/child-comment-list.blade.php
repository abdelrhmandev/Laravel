  @foreach($comments as $comment)
 <div class="display-replies-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif> 
  <p style="color: red"> 
    
    
     {{ $comment->comment }} </p>
   @if(count((array)$comment->replies))

            @include('backend.includes.child-comment-list',['comments'=>$comment->replies])

            {{-- @each('backend.includes.child-comment-list', $comment->replies, 'comments', 'backend.includes.empty') --}}
   @endif

 </div>
 @endforeach
 
{{-- {{ $counter}} --}}
@foreach($reviews as $review)
<div class="display-replies-comment"> 


  
<p style="color: green"><b>{{ $review->id }} :: {{ $review->comment }}</b></p>

{{-- <br>Replies<br> --}}

 
 

{{ $review->replies->count() > 0 ? 'Replies' : '' }}
@include('backend.includes.child-comment-list',['comments'=>$review->replies])



    
{{-- @each('backend.includes.child-comment-list', $review->replies, 'comments', 'backend.includes.empty') --}}


  </div>
@endforeach 
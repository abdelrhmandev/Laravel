{{-- {{ $counter}} --}}
@foreach($reviews as $review)
<div class="display-replies-comment" @if($review->parent_id != null) style="margin-left:40px;" @endif> 


  
    <p>{{ $review->comment }}</p>


 

    @include('backend.includes.reviews',[
      // 'avg'=>$row->reviews->avg('rate') ?? 0,
      'reviews'=>$review->replies,
      // 'counter'=>$reviews->count()
      ])

  </div>
@endforeach 
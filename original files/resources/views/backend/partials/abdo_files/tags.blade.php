<div class="form-group">
  <h1>Tags (Done)</h1>
 <br>
 <button type="button" class="btn btn-primary btn-xs" id="selectbtn-tag">
  Select all
</button>

<button type="button" class="btn btn-primary btn-xs" id="deselectbtn-tag">
  Deselect all
</button>
<br/>
@foreach ($tags as $tag)
<input name="tag[]" value="{{ $tag->id }}" type="checkbox" @if(in_array($tag->id,$row->tag->pluck('id')->toArray())) checked @endif>{{ $tag->item->title }}
<br/>
@endforeach
</div>

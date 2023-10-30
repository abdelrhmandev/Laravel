
<div id="galleryCounter"></div>
<br>
<br>
<br>
@if(count($media))
<table id="gallery">
  <tr>
    <th>ID</th>
    <th>Image</th>
  </tr>
  @foreach ($media as $gallery)
  <tr id="tr_{{ $gallery->id }}">
    <td>
      
      {{ $gallery->id }} <input id="{{ $gallery->id }}" onclick="delete_gallery_image({{ $gallery->id }})" name="deletegallery" value="{{ $gallery->id }}" class="form-check-input" type="checkbox"/>
    </td>
    <td>
      <img src="{{ asset($gallery->file) }}" width="100">  
    </td> 
  </tr>
  @endforeach   
</table>
@else
<div id="EmptygalleryMsg"></div>
@endif 



 
{{-- <div class="form-group">
    <h1>Youtube (Done) {{ $media->where('type','youtube')->count() }}</h1>
    <table>
    @forelse($media->where('type','youtube') as $youtube)
        <tr>
          <td>
            <input type="text" name="media_youtybe[]" value="{{ $youtube->url }}">
            <br>           
            <iframe width="150" height="150" src="{{ $youtube->url }}">
            </iframe> 
  
           <br>
          </td>
        </tr>
        @empty
        No pdf founds
        @endforelse
  </table>
  </div>
   --}}
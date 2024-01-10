{{-- <div class="form-group">
    <h1>Gallery (Done) {{ $media->where('type','gallery')->count() }}
    </h1>
    <table>
    @forelse($media->where('type','gallery') as $gallery)
        <tr>
          <td>
           <img src="{{ asset("storage/".$gallery->url) }}" width="50" style="padding:10px;">
           <br>
          </td>
        </tr>
        @empty
        No Gallery founds
        @endforelse
  </table>
  </div>
   --}}
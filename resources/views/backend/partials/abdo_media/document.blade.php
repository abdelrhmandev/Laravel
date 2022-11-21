<div class="form-group">
    <h1>pdf (Done) {{ $media->where('type','document')->count() }}</h1>
    <table>
    @forelse($media->where('type','document') as $document)
        <tr>
          <td>
            <a target="_new" href="{{ asset("storage/".$document->url) }}">Open File</a>
           <br>
          </td>
        </tr>
        @empty
        No pdf founds
        @endforelse
  </table>
  </div>
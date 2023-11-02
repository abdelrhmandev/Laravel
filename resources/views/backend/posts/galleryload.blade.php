


<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>Uploaded Images (<span id="galleryCounter"></span>)</h2>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="input-field" id="gallery">
            <div class="row">
                @foreach ($media as $gallery)
                    <div class="col-lg-3 p-2" id="Div_{{ $gallery->id }}">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($gallery->file) }}" alt="G{{ $gallery->id }}">
                            <div class="p-2 m-2 text-center">
                              <button id="delete_media_id" value="{{ $gallery->id }}" class="btn btn-danger btn-sm delete_media_btn"><i class="bi bi-trash-fill"></i>{{ __('site.delete')}}</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>            
        </div>                
        <div id="EmptygalleryMsg" class="text-danger"></div>
    </div>
    
 </div>


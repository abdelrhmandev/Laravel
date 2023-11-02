<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.author')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <select name="user_id" id="user_id" class="form-select form-select-solid" data-hide-search="false" data-control="select2" data-close-on-select="true" data-placeholder="Select an author" data-allow-clear="true">
        @foreach($authors as $author)          
        <option value="{{ $author->id }}" {{ isset($id) && $id == $author->id ? 'selected':'' }} >{{  $author->name }}</option>
        @endforeach  
        </select>
    </div>
</div>

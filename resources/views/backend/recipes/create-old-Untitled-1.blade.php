<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <?php $ii = 1; ?>											 
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <h1>Title {{ $properties['name'] }}</h1>
    
    <?php $lang = substr($properties['regional'],0,2);?>
    <div>
      <input class="form-control form-control-solid" type="text" name="title_{{$lang}}">
    </div>
    
     
    
    
    <br/>
    <h1>Description {{ $properties['name'] }}</h1>
    <div>{{ $properties['name'] }}
      <input class="form-control form-control-solid" type="text" name="description_{{$lang}}">
    </div>
    
    <?php $ii++;	?>
    @endforeach
    <br>
    
    <h1>Category</h1>
     
      <select name="category_id" id="category_id">
        <option value="0">---------</option>    
            @foreach ($categories as $category)
            <option value="{{$category->id }}"> {{$category->item->title }}</option>
            @endforeach
        </select>
     
    
     
    <h1>Tags</h1>
    
    @foreach ($tags as $tag)
    <p><input type="checkbox" name="tag[]" value="{{$tag->id }}"> {{$tag->item->title }}</p>
    @endforeach
    
    
    
    <h1>Image</h1>
    <input type="file" id="image" name="image" accept="image/*" /> 
    
    <br/>
    <br/>
    
    featured<input type="checkbox" name="featured" value="1"> 
    <br/>
    <br/>
    published <input type="checkbox" name="published" value="1"> 
    
    
    <br/>
    <br/>
    
    cook time by minutes <input type="text" name="cook"> 
    
    <br/>
    <br/>
    
    servings <input type="text" name="servings"> 
    
    
    <br/>
    
    <p><input type="submit"></p>
    
    
    
    </form>
<ul>
    @foreach ($collection as $ca)
    <span style="color: red;">{{ $ca->id }}</span>
    @include ('backend.categories.ccca')
    @endforeach
</ul>


 
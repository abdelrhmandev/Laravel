<table cellpading="2">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($languages as $language)        
      <tr>
        <td>{{ $language->id }}</td>
        <td>{{ $language->title }}</td>
      </tr>
      @empty
      {{  trans('language.no_languages_added') }}
      @endforelse

    </tbody>
  </table>

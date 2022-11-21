<table cellpading="2">

    <thead>
      <tr>
        <th>#</th>
        <th>question</th>
        <th>answer</th>
   
      </tr>
    </thead>
    <tbody>
        @forelse ($faqs as $faq)        
      <tr>
        <td>{{ $faq->id }}</td>
        <td>{{ $faq->faq->question }}</td> 
        <td>{{ $faq->faq->answer }}</td>  
        
       

        <td>           
 

      </tr>
      @empty
      {{  trans('category.no_categorys_added') }}
      @endforelse

    </tbody>
  </table>

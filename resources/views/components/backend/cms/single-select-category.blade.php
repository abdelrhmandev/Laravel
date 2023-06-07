<!--begin::Category & tags-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Parent Category</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <!--begin::Label-->
      
        <!--end::Label-->
        <!--begin::Select2-->

        {{-- <select class="form-select mb-2" data-control="select2" data-allow-clear="true">
           <option value="0">None</option>
            {!! $categories !!} 
        </select> --}}
 
 

            
{{-- https://stackoverflow.com/questions/43989728/how-to-create-a-nested-list-of-categories-in-laravel
https://stackoverflow.com/questions/43989728/how-to-create-a-nested-list-of-categories-in-laravel --}}
        

            <ul>
                @foreach ($categories as $category)
                    <li>{{ $category->id }}</li>
                    <ul>
                    @foreach ($category->children as $childCategory)

                     
                    @include('components.backend.cms.manageChild', ['child_category' => $childCategory])

               
                    @endforeach
                    </ul>
                @endforeach
            </ul>

             
 
                

            
         

    
    </div>
    <!--end::Card body-->
</div>
<!--end::Category & tags-->
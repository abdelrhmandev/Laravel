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

        
        <ul id="tree1">
        @foreach($categories as $category)
        
           {{$category->translate->title }} 

           @if(count($category->_children))

           <x-backend.cms.manageChild :childs="$category->_children" />

      
           @endif
           
   @endforeach
</ul>

    
    </div>
    <!--end::Card body-->
</div>
<!--end::Category & tags-->
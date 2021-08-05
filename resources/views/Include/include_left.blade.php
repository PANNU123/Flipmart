<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
            <li class="dropdown menu-item"> <a href="{{route('categoriesid',$category->id)}}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
            <span><b>{{$category->category_name}}</b></span>
            </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @foreach ( $category->subcategories as $sub_cat )
                            <div class="col-sm-4 col-md-3">
                                <ul class="links list-unstyled">
                                    <li ><a href="{{route('subcategoriesid',$sub_cat->id)}}"><b>{{$sub_cat->subcategory_name}} </b></a></li>
                                </ul>
                            </div> 
                            @endforeach
                        </div>  
                    </li> 
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
</div>

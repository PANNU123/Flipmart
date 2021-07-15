<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Panel</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('backend/adminpanel')}}/favicon/apple-icon-120x120.png">
    <link rel="icon" type="{{asset('backend/adminpanel')}}/image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="{{asset('backend/adminpanel')}}/image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="{{asset('backend/adminpanel')}}/image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{asset('backend/adminpanel')}}/vendor/pace/pace.min.js"></script>
    <link href="{{asset('backend/adminpanel')}}/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!-- ========================================================= -->
    <!--Notification msj-->

    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('backend/adminpanel')}}/stylesheets/css/style.css">



</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.html" class="on-click">
                        <img alt="logo" src="{{asset('backend/adminpanel')}}/images/header-logo.png" />
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{asset('backend/adminpanel')}}/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{Auth::User()->name}}</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="{{request()->is('/') ? 'active-item':''}}"><a href="{{url('/')}}" target="_blank"><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Website</span></a></li>
                                <li class="{{request()->is('home') ? 'active-item':''}}"><a href="{{route('adminhome')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--CATEGORY-->
                                <li class="has-child-item close-item {{request()->is('category/*','sub-category/*') ? 'open-item':''}}" >
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Category</span></a>
                                    <ul class="nav child-nav level-1">
                                        {{-- <li ><a><i class="fa fa-list" aria-hidden="true"></i><span>Main Category</span></a> --}}
                                            <li class="has-child-item close-item {{request()->is('category/*') ? 'open-item':''}}">
                                                <a><i class="fa fa-files-o" aria-hidden="true"></i><span>Main Category</span></a>
                                                <ul class="nav child-nav level-1">
                                                    <li class="{{request()->is('category/add-category') ? 'active-item':''}}"><a href="{{route('add-category')}}">Add Category</a></li>
                                                    <li class="{{request()->is('category/manage-category') ? 'active-item':''}}"><a href="{{route('manage-category')}}">Manage cateogry</a></li>
                                                </ul>
                                            </li>

                                            <li class="has-child-item close-item {{request()->is('sub-category/*') ? 'open-item':''}}">
                                                <a><i class="fa fa-files-o" aria-hidden="true"></i><span>Sub Category</span></a>
                                                <ul class="nav child-nav level-1">
                                                    <li class="{{request()->is('sub-category/add-sub-category') ? 'active-item':''}}"><a href="{{route('add-sub-category')}}">Add Subcategory</a></li>
                                                    <li class="{{request()->is('sub-category/manage-sub-category') ? 'active-item':''}}"><a href="{{route('manage-sub-category')}}">Manage Subcateogry</a></li>
                                                </ul>
                                            </li>
                                    </ul>
                                </li>
                                <!--BRANDS-->
                                <li class="has-child-item close-item {{request()->is('brand/*') ? 'open-item':''}}">
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Brand</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{request()->is('brand/add-brand') ? 'active-item':''}}"><a href="{{route('add-brand')}}">Add Brand</a></li>
                                        <li class="{{request()->is('brand/manage-brand') ? 'active-item':''}}"><a href="{{route('manage-brand')}}">Manage Brand</a></li>
                                    </ul>
                                </li>
                                <li class="has-child-item close-item {{request()->is('slider/*') ? 'open-item':''}}">
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Slider</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{request()->is('slider/add-slider') ? 'active-item':''}}"><a href="{{route('add-slider')}}">Add Slider</a></li>
                                        <li class="{{request()->is('slider/manage-slider') ? 'active-item':''}}"><a href="{{route('manage-slider')}}">Manage Slider</a></li>
                                    </ul>
                                </li>

                                <!--DOCUMENTATION-->


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                @yield('content');

            </div>


            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->

    <script src="{{asset('backend/adminpanel')}}/vendor/jquery/jquery-1.12.3.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{asset('backend/adminpanel')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    {{-- <script src="{{asset('backend/adminpanel')}}/vendor/nano-scroller/nano-scroller.js"></script> --}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('backend/adminpanel')}}/javascripts/template-script.min.js"></script>
    <script src="{{asset('backend/adminpanel')}}/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <!--morris chart-->
    <script src="{{asset('backend/adminpanel')}}/vendor/chart-js/chart.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{asset('backend/adminpanel')}}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('backend/adminpanel')}}/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend/adminpanel')}}/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
    <!--Examples-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="{{asset('backend/adminpanel')}}/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples -->
    <script>
        $(document).ready(function(){
            $('body').on('change','#brandstatus',function(){
            var id=$(this).attr('data-id');
            if(this.checked){
               var status=1;
            }else{
                var status=0;
            }
           $.ajax({
            url:'brandstatus/'+id+'/'+status,
            method:'get',
            success:function(result){
                console.log(result);
            }
           });
        })
        });
    </script>
    <script>
        $(document).ready(function(){
            $('body').on('change','#Categorystatus',function(){
            var id=$(this).attr('data-id');
            if(this.checked){
               var status=1;
            }else{
                var status=0;
            }
           $.ajax({
            url:'categorystatus/'+id+'/'+status,
            method:'get',
            success:function(result){
                console.log(result);
            }
           });
        })
        });
    </script>

<script>
    $(document).ready(function(){
        $('body').on('change','#subcategorystatus',function(){
        var id=$(this).attr('data-id');
        if(this.checked){
           var status=1;
        }else{
            var status=0;
        }
       $.ajax({
        url:'subcategorystatus/'+id+'/'+status,
        method:'get',
        success:function(result){
            console.log(result);
        }
       });
    })
    });
</script>
        <script>
            $(document).ready(function(){
                $('body').on('change','#sliderstatus',function(){
                var id=$(this).attr('data-id');
                if(this.checked){
                   var status='active';
                }else{
                    var status='inactive';
                }
               $.ajax({
                url:'sliderstatus/'+id+'/'+status,
                method:'get',
                success:function(result){
                    console.log(result);
                }
               });
            })
            });
        </script>
</body>

</html>

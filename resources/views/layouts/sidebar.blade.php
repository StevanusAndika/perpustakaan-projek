<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="45" class="mt-2" >
                        
                    </span>
                </a>
               
            </div>

            <ul id="side-menu">
                <li class="menu-title">Menu</li>

                @if(auth()->user()->role == 'user')
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-home-outline  text-primary"></i>

                        <span> Beranda </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('books.index') }}">
                        <i class="mdi mdi-book text-primary"></i>
                        <span> Koleksi Buku </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('books.index') }}?status=borrowed">
                        <i class="mdi mdi-book-open-variant  text-danger"></i>
                        <span> Buku Yang Dipinjam </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('books.index') }}?status=returned">
                        <i class="mdi mdi-book-check  text-success"></i>
                        <span> Buku Yang Dikembalikan </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('profile.index') }}">
                        <i class="mdi mdi-account-circle-outline text-info"></i>
                        <span> Profil </span>
                    </a>
                </li>
                

                    
                @else
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class=" mdi mdi-home-outline  text-24 text-white"></i>
                            <span> Beranda</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.category.index') }}">
                            <i class=" mdi  mdi text-24 text-white"></i>
                            <span> Kategori</span>
                        </a>
                    </li>
                    
                       
                    <li>
                        <a href="{{ route('books.index') }}">
                            <i class="mdi mdi-book text-white"></i>
                            <span> Koleksi Buku </span>
                        </a>
                    </li>
                    <li>
                    
                    </li>
                    
                   
                    
                @endif

                @env('local')
                @endenv
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
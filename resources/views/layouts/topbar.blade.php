
<!-- Topbar Start -->
<div class="topbar-custom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                <li class="d-none d-lg-block">
                    <div class="position-relative topbar-search">
                       
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
    
              

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/user-12.jpg') }}" alt="user-image" class="rounded-circle">

                       
                        <span class="pro-user-name ms-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                           
                            <p class="text-overflow m-0 mt-2">
                                Welcome, <strong>{{ Auth::user()->name }}</strong>!
                            </p>
                            <hr>
                           
                        </div>
                        

                        


                        <!-- item-->
                        <a href="{{ route('profile.index') }}" class="dropdown-item notify-item d-flex align-items-center gap-2">
                            <i class="mdi mdi-account-circle-outline fs-16"></i>
                            <span>Profil</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item" id="logoutButton">
                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                            <span>Logout</span>
                        </a>

                        <div class="dropdown-divider"></div>

                      
                        
                        

                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>
@section ('custom-script')

<script>
    document.getElementById('logoutButton').addEventListener('click', function() {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda ingin logout?',
            showCancelButton: true,
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route("logout") }}';
            }
        });
    });
    </script>
    
<!-- end Topbar -->

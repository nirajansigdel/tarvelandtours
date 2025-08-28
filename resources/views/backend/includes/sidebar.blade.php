<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(navbar-${navbarStyle});
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" aria-label="Toggle Navigation" data-bs-original-title="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
        </div>
        <a class="navbar-brand" href="#">
            <div class="d-flex align-items-center py-3">
                <img class="me-2" src="{{ asset('adminassets/assets/img/icons/spot-illustrations/falcon.png') }}"
                    alt="" width="40">
                <span class="font-sans-serif">Admin</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <i class="fas fa-chart-pie"></i>
                            </span>
                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        @can('list_services')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.services.index') }}">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span class="nav-link-text ps-1">Service</span>
                                </div>
                            </a>
                        </li>
                        @endcan
                        @can('list_demands')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.demands.index') }}">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-angle-double-right"></i>
                                    <span class="nav-link-text ps-1">Project</span>
                                </div>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                {{-- Beginning of Site Settings --}}
                @hasanyrole('superadmin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Site Settings</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'site-settings' ? '' : 'collapsed' }}"
                            href="#dashboard6" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::segment(2) == 'site-settings' ? 'true' : 'false' }}"
                            aria-controls="dashboard6">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-link-text ps-1">Site Settings</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ Request::segment(2) == 'site-settings' ? 'show' : '' }}" id="dashboard6">
                            @can('list_site_settings')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'site-settings' ? 'active' : '' }}"
                                        href="{{ route('admin.site-settings.index') }}">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-angle-double-right"></i> Site Setting
                                        </div>
                                    </a>
                                </li>
                            @endcan
                            {{-- Insert Favicon Menu Item here --}}
                            @can('list_favicons')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'favicons' ? 'active' : '' }}"
                                        href="{{ route('admin.favicons.index') }}">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-angle-double-right"></i> Favicon
                                        </div>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    </li>
                @endhasanyrole
                {{-- End of Site Settings --}}




                {{-- Beginning of Contact Details --}}
                @hasanyrole('superadmin|admin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Contact Details</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'contact-details' ? '' : 'collapsed' }}"
                            href="#dashboard18" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::segment(2) == 'contact-details' ? 'true' : 'false' }}"
                            aria-controls="dashboard18">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-link-text ps-1">Contact Details</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ Request::segment(2) == 'contact-details' ? 'show' : '' }}"
                            id="dashboard18">
                            {{-- Visitors Book --}}
                            @can('list_visitors_book')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'contact-details' && Request::segment(3) == 'visitors-book' ? 'active' : '' }}"
                                        href="{{ route('admin.visitors-book.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Visitors Book
                                        </div>
                                    </a>
                                </li>
                            @endcan

                            {{-- CEO Message
                            @can('list_ceomessage')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'contact-details' && Request::segment(3) == 'ceomessage' ? 'active' : '' }}"
                                        href="{{ route('admin.ceomessage.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            CEO Message
                                        </div>
                                    </a>
                                </li>
                            @endcan --}}

                            {{-- Student Details --}}
                            @can('list_student_details')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'contact-details' && Request::segment(3) == 'student-details' ? 'active' : '' }}"
                                        href="{{ route('admin.student-details.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Worker Details
                                        </div>
                                    </a>
                                </li>
                            @endcan

                            {{-- Contacts --}}
                            @can('list_contacts')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'contact-details' && Request::segment(3) == 'contacts' ? 'active' : '' }}"
                                        href="{{ route('admin.contacts.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Contacts
                                        </div>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    </li>
                @endhasanyrole
                {{-- End of Contact Details --}}



                {{-- Beginning of Informations --}}
                {{-- 
                @hasanyrole('superadmin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Informations</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#dashboard15" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard15">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-link-text ps-1">Informations</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ Request::segment(2) == 'informations' ? 'show' : '' }}"
                            id="dashboard15">
                         
                            @can('list_countries')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'countries' ? 'active' : '' }}"
                                        href="{{ route('admin.countries.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Country
                                        </div>
                                    </a>
                                </li>
                            @endcan

                          
                            @can('list_companies')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'company' ? 'active' : '' }}"
                                        href="{{ route('admin.companies.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Company
                                        </div>
                                    </a>
                                </li>
                            @endcan

                           
                            @can('list_work_categories')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'work-category' ? 'active' : '' }}"
                                        href="{{ route('admin.work_categories.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Work Category
                                        </div>
                                    </a>
                                </li>
                            @endcan

                        
                            @can('list_demands')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'demands' ? 'active' : '' }}"
                                        href="{{ route('admin.demands.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Demand
                                        </div>
                                    </a>
                                </li>
                            @endcan

                        
                             @can('list_applications')
                             <li class="nav-item">
                                 <a class="nav-link {{ Request::segment(2) == 'demands' ? 'active' : '' }}"
                                     href="{{ route('admin.applications.index') }}">
                                     <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                         Applications
                                     </div>
                                 </a>
                             </li>
                         @endcan
                        </ul>
                    </li>
                    </li>
                @endhasanyrole


                 --}}
                {{-- End of Informations --}}



                {{-- Beginning of Introduction --}}
                @hasanyrole('superadmin')
                    <li class="nav-item">
                        <!-- Navbar vertical label -->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Introduction</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                        <!-- Dropdown item -->
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'about-us' || Request::segment(2) == 'cover-images' || Request::segment(2) == 'services' || Request::segment(2) == 'team' ? '' : 'collapsed' }}"
                            href="#dashboardIntro" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::segment(2) == 'about-us' || Request::segment(2) == 'cover-images' || Request::segment(2) == 'services' || Request::segment(2) == 'team' ? 'true' : 'false' }}"
                            aria-controls="dashboardIntro">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-link-text ps-1">Introduction</span>
                            </div>
                        </a>
                        <!-- Collapse content -->
                        <ul class="nav collapse {{ Request::segment(2) == 'about-us' || Request::segment(2) == 'cover-images' || Request::segment(2) == 'services' || Request::segment(2) == 'team' ? 'show' : '' }}"
                            id="dashboardIntro">
                            {{-- About Us --}}
                         <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'about-us' ? 'active' : '' }}"
                                    href="{{ route('admin.about-us.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">About Us</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Cover Image --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'cover-images' ? 'active' : '' }}"
                                    href="{{ route('admin.cover-images.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">Cover Image</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Services 
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'services' ? 'active' : '' }}"
                                    href="{{ route('admin.services.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">Services</span>
                                    </div>
                                </a>
                            </li>

--}}

                            {{-- Teams --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'team' ? 'active' : '' }}"
                                    href="{{ route('admin.teams.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">Teams</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li> <!-- Corrected closing tag -->
                    </li>
                @endhasanyrole
                {{-- End of Introduction --}}



@hasanyrole('superadmin|admin')
<li class="nav-item">
  <!-- Dropdown trigger -->
  <a class="nav-link dropdown-indicator {{ in_array(Request::segment(2), ['why-us', 'event', 'faqs', 'notifications', 'careers']) ? '' : 'collapsed' }}"
     href="#updateDropdown"
     role="button"
     data-bs-toggle="collapse"
     aria-expanded="{{ in_array(Request::segment(2), ['why-us', 'event', 'faqs', 'notifications', 'careers']) ? 'true' : 'false' }}"
     aria-controls="updateDropdown">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon"><i class="fas fa-edit"></i></span>
      <span class="nav-link-text ps-1">Update</span>
    </div>
  </a>

  <!-- Dropdown contents -->
  <ul class="nav collapse {{ in_array(Request::segment(2), ['why-us', 'event', 'blogs', 'notifications', 'careers']) ? 'show' : '' }}"
      id="updateDropdown">

    <!-- Why Us -->
    @hasrole('superadmin')
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(2) == 'why-us' ? 'active' : '' }}"
         href="{{ route('backend.whyus.index') }}">
        <div class="d-flex align-items-center">
          <i class="fa fa-angle-double-right"></i>
          <span class="nav-link-text ps-1">Why Us</span>
        </div>
      </a>
    </li>
    @endhasrole

    <!-- Event -->
    @hasrole('superadmin')
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(2) == 'event' ? 'active' : '' }}"
         href="{{ route('backend.event.index') }}">
        <div class="d-flex align-items-center">
          <i class="fa fa-angle-double-right"></i>
          <span class="nav-link-text ps-1">Event</span>
        </div>
      </a>
    </li>
    @endhasrole

    <!-- Notifications -->
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(2) == 'notifications' ? 'active' : '' }}"
         href="{{ route('admin.notifications.index') }}">
        <div class="d-flex align-items-center">
          <i class="fa fa-bell"></i>
          <span class="nav-link-text ps-1">Notifications</span>
        </div>
      </a>
    </li>

    <!-- Career Opportunities -->
   

    <!-- Blogs -->
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(2) == 'blogs' ? 'active' : '' }}"
         href="{{ route('admin.blog-posts-categories.index') }}">
        <div class="d-flex align-items-center">
          <i class="fa fa-angle-double-right"></i>
          <span class="nav-link-text ps-1">Blogs</span>
        </div>
      </a>
    </li>

  </ul>
</li>
@endhasanyrole


@hasanyrole('superadmin')
    <li class="nav-item">
        <!-- Navbar vertical label -->
        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Opportunities</div>
            <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
            </div>
        </div>

        <!-- Dropdown item -->
        <li class="nav-item">
            <a class="nav-link dropdown-indicator 
                {{ Request::segment(2) == 'careers' || Request::segment(2) == 'career-applications' ? '' : 'collapsed' }}"
               href="#opportunitiesMenu" role="button" data-bs-toggle="collapse"
               aria-expanded="{{ Request::segment(2) == 'careers' || Request::segment(2) == 'career-applications' ? 'true' : 'false' }}"
               aria-controls="opportunitiesMenu">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="fas fa-briefcase"></i></span>
                    <span class="nav-link-text ps-1">Opportunities</span>
                </div>
            </a>

            <!-- Collapse content -->
            <ul class="nav collapse {{ Request::segment(2) == 'careers' || Request::segment(2) == 'career-applications' ? 'show' : '' }}"
                id="opportunitiesMenu">

                {{-- Career Opportunities --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(2) == 'careers' ? 'active' : '' }}"
                       href="{{ route('admin.careers.index') }}">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-angle-double-right"></i>
                            <span class="nav-link-text ps-1">Career Opportunities</span>
                        </div>
                    </a>
                </li>

                {{-- Application Reports --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(2) == 'career-applications' ? 'active' : '' }}"
                       href="{{ route('admin.career-applications.index') }}">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-angle-double-right"></i>
                            <span class="nav-link-text ps-1">Application Reports</span>
                        </div>
                    </a>
                </li>
            </ul>
        </li> <!-- Corrected closing tag -->
    </li>
@endhasanyrole



                {{-- Beginning of Posts --}}
                {{-- 
                @hasanyrole('superadmin')
                    <li class="nav-item">
                        <!-- Navbar vertical label -->
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Posts</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                        <!-- Dropdown item -->
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'posts' ? '' : 'collapsed' }}"
                            href="#dashboard23" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::segment(2) == 'posts' ? 'true' : 'false' }}"
                            aria-controls="dashboard23">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-users"></i></span>
                                <span class="nav-link-text ps-1">Posts</span>
                            </div>
                        </a>
                        <!-- Collapse content -->
                        <ul class="nav collapse {{ Request::segment(2) == 'posts' ? 'show' : '' }}" id="dashboard23">
                        
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'categories' ? 'active' : '' }}"
                                    href="{{ route('admin.categories.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">Categories</span>
                                    </div>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(3) == 'create' || (Request::segment(2) == 'posts' && Request::segment(3) != 'categories') ? 'active' : '' }}"
                                    href="{{ route('admin.posts.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="nav-link-text ps-1">Post</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li> 
                    </li>
                @endhasanyrole
                 --}}
                {{-- End of Posts --}}





                {{-- Beginning of Gallery --}}

                @hasanyrole('superadmin|admin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Gallery</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#dashboard11" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><i
                                        class="fas fa-users"></i></span><span class="nav-link-text ps-1">Gallery
                                </span></div>
                        </a>
                        <ul class="nav collapse  {{ Request::segment(2) == 'photo-galleries' || Request::segment(2) == 'video-galleries' ? 'show' : '' }}"
                            id="dashboard11">
                            @can('list_photo_galleries')
                                <li class="nav-item"><a
                                        class="nav-link {{ Request::segment(2) == 'photo-galleries' ? 'active' : '' }}"
                                        href="{{ route('admin.photo-galleries.index') }}">
                                        <div class="d-flex align-items-center"><i class="fa fa-angle-double-right"></i>
                                            Photo Gallery

                                        </div>
                                    </a>
                                </li>
                            @endcan

                            @can('list_video_galleries')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(2) == 'video-galleries' ? 'active' : '' }}"
                                        href="{{ route('admin.video-galleries.index') }}">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-angle-double-right"></i> Video Gallery
                                        </div>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                    </li>
                @endhasanyrole

                {{-- End of Gallery --}}






                {{-- Beginning of Student Reviews --}}
                {{--  
                @hasanyrole('superadmin|admin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Student Reviews</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#dashboard16" role="button"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard16">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><i
                                        class="fas fa-users"></i></span><span class="nav-link-text ps-1">Testimonials
                                </span></div>
                        </a>
                        <ul class="nav collapse  {{ Request::segment(2) == 'testimonials' ? 'show' : '' }}"
                            id="dashboard16">
                            @can('list_testimonials')
                                
                            @endcan

                        </ul>
                    </li>
                    </li>
                    
                @endhasanyrole
                --}}
                {{-- End of Student Reviews --}}

                {{-- Beginning of Blog Posts Category --}}
                
             
                {{-- End of Blog Posts Category --}}

                {{-- Beginning of FAQs --}}
                @hasanyrole('superadmin|admin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">FAQs</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'faqs' ? 'active' : '' }}"
                            href="#faq" role="button" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="faq">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-question-circle"></i></span>
                                <span class="nav-link-text ps-1">FAQs</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ Request::segment(2) == 'faqs' ? 'show' : '' }}" id="faq">
                            {{-- FAQs --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'faqs' ? 'active' : '' }}"
                                    href="{{ route('admin.faqs.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-list"></i>
                                        <span class="nav-link-text ps-1">Procurement</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                @endhasanyrole
                {{-- End of FAQs --}}

                {{-- Beginning of CEOMESSAGE --}}
               @hasanyrole('superadmin')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">CEO Messages</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider">
                            </div>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'ceomessage' ? 'active' : '' }}"
                            href="#d_msg" role="button" data-bs-toggle="collapse" aria-expanded="true"
                            aria-controls="d_msg">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="fas fa-question-circle"></i></span>
                                <span class="nav-link-text ps-1">CEO Messages</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ Request::segment(2) == 'ceomessage' ? 'show' : '' }}"
                            id="d_msg" id="dashboard21">
                            {{-- CEO Messages --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(2) == 'ceomessage' ? 'active' : '' }}"
                                    href="{{ route('admin.ceomessage.index') }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-list"></i>
                                        <span class="nav-link-text ps-1">CEO Message</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    </li>
                @endhasanyrole
                {{-- End of CEOMESSAGE --}}


                 {{-- 
@hasanyrole('superadmin|admin')
<li class="nav-item">
    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
        <div class="col-auto navbar-vertical-label">Our Clients</div>
        <div class="col ps-0">
            <hr class="mb-0 navbar-vertical-divider">
        </div>
    </div>
    <a class="nav-link dropdown-indicator {{ Request::segment(2) == 'clients' ? 'active' : '' }}"
       href="#clients" role="button" data-bs-toggle="collapse" aria-expanded="true"
       aria-controls="clients">
        <div class="d-flex align-items-center">
            <span class="nav-link-icon"><i class="fas fa-question-circle"></i></span>
            <span class="nav-link-text ps-1">Our Clients</span>
        </div>
    </a>
    <ul class="nav collapse {{ Request::segment(2) == 'clients' ? 'show' : '' }}" id="clients">
       
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'clients' ? 'active' : '' }}"
               href="{{ route('admin.client.index') }}">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <span class="nav-link-text ps-1">Clients</span>
                </div>
            </a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'clients' ? 'active' : '' }}"
               href="{{ route('admin.client_messages.index') }}">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <span class="nav-link-text ps-1">Clients Messages</span>
                </div>
            </a>
        </li>
    </ul>
</li>
@endhasanyrole

--}}
{{-- Beginning of Testimonials --}}
{{-- Testimonials Section --}}
@hasanyrole('superadmin|admin')
    <li class="nav-item">
        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Testimonials</div>
            <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(2) == 'testimonials' ? 'active' : '' }}"
            href="{{ route('admin.testimonials.index') }}">
            <div class="d-flex align-items-center">
                <i class="fa fa-angle-double-right"></i>
                <span class="nav-link-text ps-1">Testimonials</span>
            </div>
        </a>
    </li>
@endhasanyrole



             {{-- End of Our Clients --}}


            </ul>
        </div>
    </div>


</nav>
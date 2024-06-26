 <!-- Header/Navbar-->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <div class="container" id="flag">

         <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
             aria-controls="navbarDefault" aria-expanded="false"
             aria-label="Toggle navigation"><span></span><span></span><span></span></button>
         <a href="{{ route('home') }}">
             <img src="{{ asset(settings()->logo) }}" width="130px" height="85px" alt=""
                 style="object-fit: contain;">

         </a>
         <a style ="font-weight: 500;" class="navbar-brand text-brand px-4"
             href="{{ route('home') }}">{{ settings()->website_title }}
             {{-- <span class="color-b">للزراعة
             </span> --}}
         </a>
         <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                         href="{{ route('home') }}">@lang('words.home')
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                         href="{{ route('about') }}">@lang('words.about_us') </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('services', 'service') ? 'active' : '' }}"
                         href="{{ route('services') }}">@lang('words.services')
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('galleries', 'gallery') ? 'active' : '' }}"
                         href="{{ route('galleries') }}">@lang('words.galleries')
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                         href="{{ route('contact') }}">@lang('words.contact_us')
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- End Header/Navbar-->

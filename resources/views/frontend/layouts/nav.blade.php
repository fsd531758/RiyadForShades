 <!-- Header/Navbar-->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <div class="container">
         <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
             aria-controls="navbarDefault" aria-expanded="false"
             aria-label="Toggle navigation"><span></span><span></span><span></span></button>
             <img src="{{ asset(settings()->logo) }}" width="70px" height="70px" alt="">
             <a
             class="navbar-brand text-brand" href="{{ route('home') }}">ورد الياسمين <span class="color-b">للزراعة </span></a>
         <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
             <ul class="navbar-nav">
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                         href="{{ route('home') }}">الرئيسية</a></li>
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                         href="{{ route('about') }}">من نحن</a></li>
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                         href="{{ route('services') }}">الخدمات</a></li>
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                         href="{{ route('contact') }}">تواصل معنا</a></li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- End Header/Navbar-->

 <!-- Header/Navbar-->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
     <div class="container" id="flag">

         <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
             aria-controls="navbarDefault" aria-expanded="false"
             aria-label="Toggle navigation"><span></span><span></span><span></span></button>
         <a href="{{ route('home') }}">
             <img src="{{ asset(settings()->logo) }}" width="70px" height="70px" alt="">

         </a>
         <a class="navbar-brand text-brand" href="{{ route('home') }}">ورد الياسمين <span class="color-b">للزراعة
             </span></a>
         <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
             <ul class="navbar-nav">
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                         href="{{ route('home') }}">الرئيسية</a></li>
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                         href="{{ route('about') }}">من نحن</a></li>
                 <li class="nav-item"><a
                         class="nav-link {{ request()->routeIs('services', 'service') ? 'active' : '' }}"
                         href="{{ route('services') }}">الخدمات</a></li>

                 <li class="nav-item"><a
                         class="nav-link {{ request()->routeIs('products', 'product') ? 'active' : '' }}"
                         href="{{ route('products') }}">المنتجات</a></li>

                 <li class="nav-item"><a
                         class="nav-link {{ request()->routeIs('galleries', 'gallery') ? 'active' : '' }}"
                         href="{{ route('galleries') }}">سابقة الاعمال</a></li>
                 <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                         href="{{ route('contact') }}">تواصل معنا</a></li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- End Header/Navbar-->
 @push('scripts')
     <script>
         if (localStorage.getItem("itemsCount") === null)
             localStorage.setItem("itemsCount", 0)
         $('#flag').append(`
           <div style='position: relative;'  id="cart">
               <div class='coustom'>
                   <div style='font-size: 11px;'>
                       ${localStorage.getItem("itemsCount")}
                   </div>
               </div>
               <a href="{{ route('cart') }}"> 
                   <i class="fas fa-shopping-cart"></i>
               </a>                
           </div>
       `);
     </script>
 @endpush

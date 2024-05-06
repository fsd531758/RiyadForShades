  <!-- Footer -->
  <footer style="background-color: #f3f3f3" dir="rtl" class="text-center text-lg-start bg-body-tertiary text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <!-- Left -->
          <div class="me-5 d-none d-lg-block footer-head">
              <span>تواصل معنا من خلال مواقع التواصل الاجتماعي الاتية :</span>
          </div>
          <!-- Left -->

          <!-- Right -->
          <div>
              @foreach (contacts() as $contact)
                  @if ($contact->type == 'social')
                      <a target="_blank" href="https://{{ $contact->contact }}" class="me-4 text-reset">
                          <i aria-hidden="true" class="{{ $contact->icon }}"></i>
                      </a>
                  @endif
              @endforeach
          </div>
          <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
          <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                      <!-- Content -->
                      <h6 class="text-uppercase fw-bold mb-4">
                          <i class="fas fa-gem me-3"></i>{{ settings()->website_title }}
                      </h6>

                      <p class="paragraph"> {!! settings()->meta_description !!}</p>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                      <!-- Links -->
                      <h6 class="text-uppercase fw-bold mb-4">
                          روابط مهمة
                      </h6>
                      <li><a href="{{ route('home') }}"
                              class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('words.home') }}</a>
                      </li>
                      <li><a href="{{ route('about') }}"
                              class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">{{ __('words.about_us') }}</a>
                      </li>
                      <li><a href="{{ route('services') }}"
                              class="nav-item {{ request()->routeIs('services', 'service') ? 'active' : '' }}">{{ __('words.services') }}</a>
                      </li>
                      <li><a href="{{ route('galleries') }}"
                              class="nav-item {{ request()->routeIs('galleries', 'gallery') ? 'active' : '' }}">@lang('words.galleries')</a>
                      </li>
                      <li><a href="{{ route('contact') }}"
                              class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('words.contact_us') }}</a>
                      </li>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                      <!-- Links -->
                      <h6 class="text-uppercase fw-bold mb-4"> وسائل التواصل </h6>
                      @foreach (contacts() as $contact)
                          @if ($contact->type == 'mobile')
                              <p><span>{{ __('words.mobile') }}: </span>
                                  <a href="tel:{{ $contact->contact }}" class="mx-1"
                                      style="direction: ltr;">{{ $contact->contact }}</a>
                              </p>
                          @elseif($contact->type == 'phone')
                              <p> <span>{{ __('words.phone') }}: </span>
                                  <a href="tel:{{ $contact->contact }}" class="mx-1"
                                      style="direction: ltr;">{{ $contact->contact }}</a>
                              </p>
                          @elseif($contact->type == 'email')
                              <p> <span>{{ __('words.email') }}: </span>
                                  <a href="mailto:{{ $contact->contact }}" class="mx-1">{{ $contact->contact }}</a>
                              </p>
                          @endif
                      @endforeach

                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
          </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="copy-rights  text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          <div class="row">
              <div class="col-12 text-center px-0">
                  <p class="marwan-copyrights w-100 d-flex justify-content-center align-items-center">
                      <span>{{ __('words.marwan_copyrights') }}</span>&nbsp;<a
                          href="https://marwan.tech/ar/service-request"
                          target="_blank">{{ __('words.marwan_company') }}</a>
                  </p>
              </div>
          </div>
      </div>
      <!-- Copyright -->
  </footer>
  <!-- Footer -->

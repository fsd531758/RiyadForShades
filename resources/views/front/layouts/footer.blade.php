      <!--to top-->
      <div id="toTop">
          <button> <i class="fa-solid fa-arrow-turn-up"></i></button>
      </div>
      <!--to top-->
      <!--footer part-->
      <footer style="background-image: url({{ asset('site/images/bgs/map-bg.png') }})">
          <div class="container">
              <div class="footer-content">
                  <div class="row">
                      <div class="col-lg-3 col-md-6">
                          <div class="footer-box">
                              <h4>@lang('site.about')</h4>
                              <div class="text">
                                  <p>{!! Settings()->footer_description !!}</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <div class="footer-box">
                              <h4>@lang('site.link')</h4>
                              <ul class="map-links">
                                  <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                                  <li><a href="{{ route('about') }}">@lang('site.about')</a></li>
                                  <li><a href="{{ route('news') }}">@lang('site.news')</a></li>
                                  <li><a href="{{ route('products') }}">@lang('site.products')</a></li>
                                  <li><a href="{{ route('contact') }}">@lang('site.contact')</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <div class="footer-box">
                              <h4>@lang('site.recent_posts') </h4>
                              <ul class="map-links">
                                  @foreach (blogs() as $blog)
                                      <li><a href="{{ route('single-news', $blog->id) }}">{{ $blog->title }}</a>
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <div class="footer-box">
                              <h4>@lang('site.contact_info') </h4>
                              <div class="contact">
                                  <p> <i class="fa-solid fa-location-dot"></i><a href="{{ route('contact') }}">
                                          {{ Settings()->address }}</a></p>
                                  <p> <i class="fa-solid fa-phone"></i><a
                                          href="tel:{{ Settings()->phone }}">@lang('site.phone'):
                                          <span style="direction: ltr; display: inline-flex;">
                                          {{ Settings()->phone }}
                                          </span>
                                      </a></p>
                                  <p> <i class="fa-solid fa-envelope-open-text"></i><a
                                          href="mailto:{{ Settings()->email }}">@lang('site.email'):
                                          {{ Settings()->email }}</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="copyright">
              <div class="container">
                  <div class="copy-text">
                      <p>{{ Settings()->copyrights }} | <a
                              target="_blank"href="https://marwan.tech/">{{ trans('site.marwan') }}</a></p>
                  </div>
                  <div class="social-links">
                      <div class="links">
                        <a href="{{ Settings()->facebook }}" target="_blank" rel="noreferrer" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{ Settings()->twitter }}" target="_blank" rel="noreferrer" aria-label="twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="{{ Settings()->instagram }}" target="_blank" rel="noreferrer" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                  </div>
              </div>
          </div>
      </footer>
      <!--footer part-->
      </div>
      <script src="{{ asset('site/js/plugins.js') }}"></script>
      <script src="{{ asset('site/js/script.js') }}"></script>
      <script>
          $('#contact-us').submit(function(e) {
              e.preventDefault();
              let formData = new FormData(this);
              $.ajax({
                  type: 'POST',
                  url: "{{ route('direct_contact_post') }}",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: (response) => {
                      if (response) {
                          this.reset();
                          // $('#message-success').removeClass('hide');
                          $('#message-success').show();
                          $('#message-success').addClass('show');
                          $('#message-successalert').text(response);
                          setTimeout(() => {
                              $('#message-success').fadeOut('fast');
                          }, 5000);
                      }
                  },
                  error: function(response) {
                      $.each(response.responseJSON.errors, function(key, value) {
                          $("#" + key).next().show();
                          $("#" + key).next().html(value[0]);
                          $("#" + key).next().removeClass('d-none');
                          $("#" + key).addClass('is-invalid');
                          setTimeout(() => {
                              $("#" + key).next().fadeOut('fast');
                              $("#" + key).next().addClass('d-none');
                              $("#" + key).removeClass('is-invalid');
                          }, 5000);
                      });

                  }
              });
          });
      </script>
      </body>
      </html>

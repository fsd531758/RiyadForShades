<!-- Footer-->
<footer style="background-image: url({{ settings()->footer_img }});">
    <div class="container">
        <section id="footer">

        </section>
        <!-- Start button WhatsApp -->
        <div class="row">
            <div class="col-md-12">
                <div class="socials-a">
                    <ul class="list-inline">




                        @foreach (contacts() as $contact)
                            @if ($contact->type == 'social')
                                <li class="list-inline-item"><a href="{{ $contact->contact }}" target="_blank"><i
                                            class="{{ $contact->icon }}" aria-hidden="true"></i></a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">{{ __('words.marwan_copyrights') }} <a
                            href="https://marwan.tech/ar/service-request"
                            target="_blank">{{ __('words.marwan_company') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End  Footer-->

<!-- Footer-->
<footer style="color:white; background-image: url({{asset('uploads/images/footer_bg.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="socials-a">
                    <ul class="list-inline">

                        @foreach (contacts() as $contact)
                            <li class="list-inline-item"><a href="{{ $contact->contact }}" target="_blank"><i class="{{ $contact->icon }}"
                                        aria-hidden="true"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">جميع الحقوق محفوظة &copy; 2022 <a href="http://marwan.tech/ar">مروان جروب لتقنية المعلومات</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End  Footer-->

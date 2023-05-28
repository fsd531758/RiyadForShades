<!-- Footer-->
<footer style="color:white; background-image: url({{ asset('uploads/images/footer_bg.jpg') }});">
    <div class="container">
        <section id="footer">

        </section>
        <!-- Start button WhatsApp -->
        <div class="row">
            <div class="col-md-12">
                <div class="socials-a">
                    <ul class="list-inline">

                        @foreach (contacts() as $contact)
                            <li class="list-inline-item"><a href="{{ $contact->contact }}" target="_blank"><i
                                        class="{{ $contact->icon }}" aria-hidden="true"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">جميع الحقوق محفوظة &copy; 2022 <a
                            href="http://marwan.tech/ar">مروان جروب لتقنية المعلومات</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End  Footer-->

@push('scripts')
    <script>
        if (localStorage.getItem("itemsCount") === null)
            localStorage.setItem("itemsCount", 0)
        $('#footer').append(`
                        <div style='position: fixed; bottom: 150px; left: 50px;  background-color: #26a356; width:60px; height:60px; border-radius:50%;     display: flex;align-items: center;justify-content: center;'  id="cart">
                            <div class='coustom2'>
                                <div style='font-size: 15px;'>
                                    ${localStorage.getItem("itemsCount")}
                                </div>
                            </div>
                            <a href="{{ route('cart') }}"> 
                                <i class="fas fa-shopping-cart fa-sm" style="color: white;"></i>
                            </a>                
                        </div>
                                    `);
    </script>
@endpush

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    @include('admin.includes.alerts.success')
    @include('admin.includes.alerts.errors')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="d-flex flex-column-fluid">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

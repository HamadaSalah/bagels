@include('Admin.layouts.header')
<div class="wrapper">
    @include('Admin.layouts.sidebar')
    <div class="main-panel">
        @include('Admin.layouts.head')
        <div class="content">
            <div class="container-fluid">
                @include('Admin.layouts.messages')
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('Admin.layouts.footer')

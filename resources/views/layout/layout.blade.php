<!DOCTYPE html>
<html lang="en">

{{-- include head --}}
@include('frontend.blocks.head')

<body>
    <div class="container-fluid">
        {{-- include header --}}
        @include('frontend.blocks.header')

        <!-- main -->
        @yield('main')

    </div>

    <!-- js -->
        @include('frontend.blocks.script')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
@include('_partials/head')
<body>
<!-- Responsive navbar-->
@include('_partials/nav')
<!-- Page header with logo and tagline-->
@include('_partials/header')
<!-- Main content-->
<div class="container px-4 px-lg-5">
    @yield('content')
</div>
<!-- Footer-->
@include('_partials/footer')
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{URL::asset('js/scripts.js')}}"></script>
</body>
</html>
        <!-- <script> -->
            <!-- // function myFunction() {
            // var dots = document.getElementById("dots");
            // var moreText = document.getElementById("more");
            // var btnText = document.getElementById("myBtn");

            // if (dots.style.display === "none") {
            //     dots.style.display = "inline";
            //     btnText.innerHTML = "Read more"; 
            //     moreText.style.display = "none";
            // } else {
            //     dots.style.display = "none";
            //     btnText.innerHTML = "Read less"; 
            //     moreText.style.display = "inline";
            //     }
            // }

            <!- <script> -->


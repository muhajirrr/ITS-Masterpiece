<div class="carousel">
    @foreach ($karyas as $karya)
        <div class="item">
            <img src="{{ asset(Storage::url($karya->image)) }}" style="max-width: 456px">
        </div>
    @endforeach
</div>

<link rel="stylesheet" href="{{ asset('owlslider/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('owlslider/assets/owl.theme.default.min.css') }}">
<script src="{{ asset('owlslider/owl.carousel.min.js') }}"></script>

<script>
    $(function() {
        $('.carousel').owlCarousel({
            items: 3
        });
    });
</script>
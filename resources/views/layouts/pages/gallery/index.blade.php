<div class="container gallery-block">
    <div class="title mb-5">
        <h2 id="gallery-section">У нас особая атмосфера уюта!</h2>
        <hr>
    </div>
    <div class="gallery mt-4 row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 f-carousel" id="galleryCarousel">
        @foreach($images as $image)
            <div class="col f-carousel__slide" style="margin-right: 10px">
                <div class="card gallery-card col-12 col-md-6 col-xl-3">
                    <a href="{{$image->src}}" data-fancybox="gallery">
                        <img src="{{$image->src}}" class="gallery-img" alt="photo">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3 mb-5">
        @if(!empty($data))
            {{$data->links()}}
        @endif
    </div>
    <hr>
</div>




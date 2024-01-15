<div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
  <div class="rounded overflow-hidden">
    <div class="position-relative overflow-hidden">
      <img class="img-fluid w-100 h-100" src="{{ $movie['poster_path'] }}" alt="">
    </div>
    <div class="border border-5 border-light border-top-0 p-4">
      <p class="text-primary fw-medium mb-2"> Release date: {{ $movie['release_date'] }}</p>
      <p class="text-primary fw-medium mb-2">
        {{ $movie['vote_average'] }}
        <a href="#"><img src="img/star-icon.png" alt="star"></a>
        <a href="#"><img src="img/star-icon.png" alt="star"></a>
        <a href="#"><img src="img/star-icon.png" alt="star"></a>
        <a href="#"><img src="img/star-icon.png" alt="star"></a>
        <a href="#"><img src="img/star-icon.png" alt="star"></a>
      </p>
      <h5 class="lh-base mb-0">{{ $movie['title'] }}</h5>
    </div>
  </div>
</div>

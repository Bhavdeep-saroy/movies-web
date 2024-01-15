<div class="nav-item dropdown">
          <input wire:model.live="search" type="text" class="nav-link dropdown-toggle form-control" data-bs-toggle="dropdown" placeholder="Search">
          <div class="dropdown-menu fade-up m-0">
                 @if($searchresult->count() > 0)
        @foreach($searchresult as $result)
            <a href="{{ route('movies.play', ['movie' => $result['id']]) }}" class="dropdown-item">
                <span><img style="height: 10px; width: 10px;" src="https://image.tmdb.org/t/p/w500/{{ $result['poster_path'] }}" alt="">
               </span>{{ $result['title'] }}</a>
        @endforeach
                @else
                <a class="dropdown-item"> No result found {{$search}}</a>
                 @endif
    </div>
                </div>

                
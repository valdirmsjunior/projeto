@props([
    'title' => '',
    'subtitle' => '',
    'links' => []
])

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title text-uppercase">{{ $title }}</h6>
            <ol class="m-0 breadcrumb text-uppercase">
                @forelse ($links as $link)
                    @if (!$loop->last)
                    <li class="breadcrumb-item">
                        <a href="#">{{ $link }}</a>
                    </li>
                    @else
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $link }}
                    </li>
                    @endif
                @empty
                @endforelse
            </ol>
        </div>
    </div>
</div>
@props(['href' => '#', 'icon' => 'fas fa-link', 'title'])

<li class="nav-item">
    <a href="{{ $href }}" class="nav-link {{ request()->is(trim($href, '/')) ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>{{ $title }}</p>
    </a>
</li>

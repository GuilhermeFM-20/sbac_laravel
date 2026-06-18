<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        {{--<span class="brand-text font-weight-light">SBAC Admin</span>--}}
        <span class="brand-text font-weight-light"><img src="{{ asset('dist/img/logo_sbac.png') }}" class="img-fluid" alt="Logo"></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <x-item-link href="/dashboard" icon="fas fa-tachometer-alt" title="Dashboard" />
                <x-item-link href="/items" icon="fas fa-book" title="items" />
                <x-item-link href="/rent" icon="fas fa-address-book" title="Aluguel" />
            </ul>
        </nav>
    </div>
</aside>

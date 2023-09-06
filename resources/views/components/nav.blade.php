<div class="sidebar-header">
    <div>
        <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">Administrator</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
    </div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
    @foreach ($items as $item)
        <li>
            <a href="{{ route($item['route']) }}" class="nav-link {{ Route::is($item['active']) ?: '' }}">

                <div class="parent-icon"><i class="{{ $item['icon'] }}"></i>
                </div>
                <div class="menu-title">
                    {{ $item['title'] }}
                </div>
                @if (@isset($item['badge']))
                    <span class="right badge badge-danger text-danger">New </span>
                @endif
            </a>
        </li>
    @endforeach
</ul>
<!--end navigation-->

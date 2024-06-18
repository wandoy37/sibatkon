<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('atlantis') }}/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span class="text-capitalize">
                            {{ Auth::user()->nama }}
                            <span class="user-level">{{ Auth::user()->role }}</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'bahan' ? 'active' : '' }}">
                    <a href="{{ route('bahan.index') }}">
                        <i class="fas fa-box"></i>
                        <p>Bahan</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'permohonan-pengujian' ? 'active' : '' }}">
                    <a href="{{ route('permohonan.pengujian.index') }}">
                        <i class="far fa-envelope-open"></i>
                        <p>Permohonan Pengujian</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(2) == 'checklist' ? 'active' : '' }}">
                    <a href="{{ route('checklist.index') }}">
                        <i class="fas fa-clipboard-check"></i>
                        <p>Check List Material</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

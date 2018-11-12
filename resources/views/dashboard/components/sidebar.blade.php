<div class="sidebar" data-background-color="black" data-active-color="warning">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                Masterpiece ITS
            </a>
        </div>

        <ul class="nav sidemenu">
            <li>
                <a href="{{ route('home') }}">
                    <i class="ti-pie-chart"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @can('Lihat Karya Mahasiswa')
            <li>
                <a href="{{ route('karya.index') }}">
                    <i class="ti-palette"></i>
                    <p>Karya Mahasiswa</p>
                </a>
            </li>
            @endcan

            @can('Lihat Post Kompetisi')
            <li>
                <a href="{{ route('kompetisi.index') }}">
                    <i class="ti-cup"></i>
                    <p>Kompetisi</p>
                </a>
            </li>
            @endcan

            @can('Lihat User')
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="ti-user"></i>
                    <p>Manage Users</p>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
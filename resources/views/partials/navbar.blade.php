<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Warnet Nilai A</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Warnet Nilai A' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Pegawai' ? 'active' : '' }}" href="{{ url('/pegawai') }}">Employee
                        Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Member' ? 'active' : '' }}" href="{{ url('/membership') }}">Member
                        Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Food and Beverages' ? 'active' : '' }}"
                        href="{{ url('/fnb') }}">Product Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Transaksi' ? 'active' : '' }}"
                        href="{{ url('/cashiertransaction') }}">Transaction Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Komputer' ? 'active' : '' }}"
                        href="{{ url('/komputer') }}">Computer Management</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ $title === 'Warnet System' ? 'active' : '' }}"
                        href="{{ url('/warnetsystem') }}">Warnet System</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

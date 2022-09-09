<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Mini CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('companies/create') ? 'active' : '' }}" aria-current="page" href="/companies/create">Add Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees') ? 'active' : '' }}" aria-current="page" href="/employees">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees/create') ? 'active' : '' }}" aria-current="page" href="/employees/create">Add Employee</a>
                    </li>
                </ul>
                @auth
                    <form method="POST" action="/logout" class="d-flex" role="logout">
                        @csrf
                        <button class="btn btn-outline-light" type="submit">Logout</button>
                    </form>
                @else
                    <a href="/login">
                        <button class="btn btn-outline-light" type="submit">Login</button>
                    </a>
                @endauth
            </div>
        </div>
    </nav>
</header>

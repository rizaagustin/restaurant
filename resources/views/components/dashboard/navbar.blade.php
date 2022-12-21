
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/') == "/") ? 'active' : ''}}" aria-current="page" href="{{ route('index') }}">Item</a>
          </li>
          <li class="nav-item">

            @if (request()->is('dashboard/category') ||
            request()->is('dashboard/category/*') ||
            request()->is('dashboard/*/category') ||
            request()->is('dashboard/*/category/*'))
              <a class="nav-link active" href="/dashboard/category">Category</a>                                
            
            @else
            
            <a class="nav-link" href="/dashboard/category">Category</a>                                
            
            @endif

          </li>
          <li class="nav-item">

            @if (request()->is('dashboard/table') ||
            request()->is('dashboard/table/*') ||
            request()->is('dashboard/*/table') ||
            request()->is('dashboard/*/table/*'))

              <a class="nav-link active" href="/dashboard/table">Table</a>                                
            
            @else
            
              <a class="nav-link" href="/dashboard/table">Table</a>                                
            
            @endif
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Promo</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </ul>
      </div>
    </div>
  </nav>
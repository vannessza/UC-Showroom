<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#jenis').change(function(){
                var selectedJenis = $(this).val();
                $('#mobil-fields, #truck-fields, #motor-fields').hide();
                
                if (selectedJenis === 'Mobil') {
                    $('#mobil-fields').show();
                } else if (selectedJenis === 'Truck') {
                    $('#truck-fields').show();
                } else if (selectedJenis === 'Motor') {
                    $('#motor-fields').show();
                }
            });
        });
    </script>
</head>
<body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('admin.order') }}">UC Showroom</a>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.customer') }}">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.kendaraan') }}">Kendaraan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.order') }}">Order</a>
                </li>
            </ul>
        
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="/logout">
                          <svg class="bi"><use xlink:href="#door-closed"/></svg>
                          <form action="/logout" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item"> Logout</button>
                          </form>
                        </a></li>
                        <li><a class="dropdown-item" href="#">Kendaraan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
      </nav>
      @yield('container')
</body>

</html>
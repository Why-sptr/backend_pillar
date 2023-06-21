<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/tambahongkir">Tambah Data</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1> Welcome, {{ Auth::user()->name }}</h1>
    </div>

    <div class="container-fluid">

        <!-- Page Heading -->
        <form class="navbar-search">
            <div class="input-group">
                <input type="search" name="search" class="form-control me-2" placeholder="Search" aria-label="search" aria-describedby="basic-addon2" style="width: 300px; margin-left: 10px; border-radius: 10px;">
                <div class="input-group-append">
                    <form action="" method="GET">
                        <button class="btn btn-outline-secondary" type="search">
                            <i class="fas fa-search fa-sm ou">Search</i>
                        </button>
                    </form>
                </div>
            </div>
        </form>
        <div class="card mb-4" style="margin-top: 20px;">
            <div class="card-header">
                <!-- Button trigger modal -->
                <a href="/tambahongkir" class="btn btn-primary">Tambah Ongkir</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ongkir</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Kota</th>
                                    <th class="text-center">Tujuan</th>
                                    <th class="text-center">Ongkir</th>
                                    <th class="text-center" width="300" height="10">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pillar as $index => $ds)

                            <tbody>

                                <tr>
                                    <td>{{ $ds->asal }}</td>
                                    <td>{{ $ds->tujuan->tujuan }}</td>
                                    <td>{{ $ds->ongkir }}</td>
                                    <td>
                                            <!-- Button trigger modal -->
                                            <a href="/tampilkandataongkir/{{ $ds->id }}" class="btn btn-primary" style="margin-right:50px; width:100px;" >Edit</a>
                                            <a href="/deleteongkir/{{ $ds->id }}" class="btn btn-danger" style="width: 100px;">Hapus</a>
                                    </td>

                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>


</body>

</html>
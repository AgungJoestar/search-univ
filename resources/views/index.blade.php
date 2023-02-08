<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/f63a52de74.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Universitas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <h1>UNIVERSITAS</h1><br>
                
                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/search" method="GET">
                            <input type="text" name="search" placeholder="Search posts with title ..." value="{{ old('search') }}">
                            <input type="submit" value="search">
                        </form>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($univ as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{ $u->name }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                            Halaman : {{ $univ->currentPage() }} <br/>
                            Jumlah Data : {{ $univ->total() }} <br/>
                            Data Per Halaman : {{ $univ->perPage() }} <br/> 
                        </div>
                        <br>
                        <div>
                            {{ $univ->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
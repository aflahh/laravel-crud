<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <center>
            <h3>All Products</h3>
        </center>

        <a href="{{ route('product.create') }}" class="btn btn-success"> + Add New Product</a>

        <br />
        <br />
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                <strong><i class="fa fa-check-circle"></i> Success!</strong>
                <br>
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <table class="table bg-light">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->description }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $d->image) }}" class="img-fluid"
                            style="width: 60px; height:60px; text-align:center; margin:0">
                    </td>
                    <td>
                        <form onsubmit="return confirm('Delete this product?');"
                            action="{{ route('product.destroy', $d->id) }}" method="POST">
                            <a href="{{ Route('product.edit', $d->id) }}" class="btn btn-sm btn-primary shadow"><i
                                    class="fa fa-edit"></i> Edit</a>
                            |
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i>
                                Delete</button>
                            |
                            <a href="{{ route('product.show', $d->id) }}" class="btn btn-sm btn-warning shadow"><i
                                    class="fa fa-info-circle"></i> Detail</a>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</body>

</html>

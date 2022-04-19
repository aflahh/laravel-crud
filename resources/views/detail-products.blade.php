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
    <center>
        <div class="container-fluid">
            <div class="container position-center">
                <div class="row page-bg">
                    <div class="p-4 col-md-12">
                        <div class="text-center top-icon">
                            <h1 class="mt-3;">Product Detail</h1>
                            <br>
                            @csrf
                            <table class="table table-bordered bg-light" style="text-align: left">
                                <tr>
                                    <th class="bg-secondary text-light">Product Name</th>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-secondary text-light">Product Description</th>
                                    <td>{{ $data->description }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-secondary text-light">Product Image</th>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->image) }}"
                                            class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-secondary text-light">Product Category</th>
                                    <td>{{ $data->category->name }}</td>
                                </tr>
                            </table>
                            <br>
                            <div class="mt-4 text-center submit-btn">
                                <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>

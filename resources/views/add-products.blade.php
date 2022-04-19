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
                            <h1 class="mt-3">Add New Product</h1>
                            <br>
                            <form id="form-add" action="{{ route('product.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div style="text-align: left" class="mt-3">
                                    <label for="name">Name</label>
                                    <input class="mt-1 form-control form-control-lg" name="name" type="text"
                                        placeholder="Name" autofocus required value="">
                                </div>

                                @error('name')
                                    <div class="alert alert-danger">
                                        Name is not valid
                                    </div>
                                @enderror

                                <div style="text-align: left" class="mt-3">
                                    <label for="description">Description</label>
                                    <input class="mt-1 form-control form-control-lg" name="description" type="text"
                                        placeholder="Description" autofocus required>
                                </div>

                                @error('description')
                                    <div class="alert alert-danger">
                                        Description is not valid
                                    </div>
                                @enderror

                                <div style="text-align: left" class="mt-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="mt-1 form-control form-control-lg form-control-file"
                                        name="image" autofocus required>
                                </div>

                                @error('image')
                                    <div class="alert alert-danger">
                                        Image is not valid
                                    </div>
                                @enderror

                                <div style="text-align: left" class="mt-3">
                                    <label for="category">Category</label>
                                    <input class="mt-1 form-control form-control-lg" name="category" type="text"
                                        placeholder="Category" autofocus required value="">
                                </div>

                                @error('category')
                                    <div class="alert alert-danger">
                                        Category is not valid
                                    </div>
                                @enderror
                            </form>
                            <br>
                            <div class="mt-4 text-center submit-btn">
                                <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary" form="form-add">Add Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>

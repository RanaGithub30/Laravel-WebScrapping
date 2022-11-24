<!DOCTYPE html>
<html>
<head>
    <title>Webscrapping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Webscrapping
        </div>
        <div class="card-body">
            <form action="{{route('get-website-data')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="url" placeholder="Enter Website's Url" class="form-control" ><br>

                @if($errors->has('url'))
                <div class="error alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $errors->first('url') }}
                </div>
                @endif

                <br>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
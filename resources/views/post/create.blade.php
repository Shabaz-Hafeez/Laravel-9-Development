<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Create</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href= "{{ asset('assets/style.css')}}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
    
    <div class="row">
    <div class="col-md-6 offset-3 mt-5" >

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('alert-success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!!</strong>   {{Session::get('alert-success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            
        @endif

    <form method="post" action="{{route('posts.store')}}"  style="margin-top: 35px" id="form" enctype="multipart/form-data">

    @csrf()
    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter your title" value="{{ old('title') }}"  >    
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="Enter your description" >{{ old('description')}}</textarea>
    </div>

     <div class="mb-3">
        <label>Published</label>
        <select name="is_publish" class="form-control" >
            <option value= ""disabled selected> Choose from the following</option>
             <option value="1" @selected (old('is_publish') == 1) > Yes</option>
              <option value="0"@selected (old('is_publish') == 0)> No</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Active</label>
        <select name="is_active" class="form-control" >
            <option value= "" disabled selected>Choose from the following</option>
            <option value="1" @selected (old('is_active') == 1)>Yes</option>
            <option value="0" @selected (old('is_active') == 0)>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="file">Image</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>



    </form>
    </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script>
 $('#form').parsley();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
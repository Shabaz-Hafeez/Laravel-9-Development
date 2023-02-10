<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Posts</title>
    <style>
        #outer{
            text-align: center;
        }
        .inner{
            display: inline-block;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href= "{{ asset('assets/style.css')}}">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />


</head>
<body>
    
    <div class="row">
    <div class="col-md-6 offset-3 mt-5" >
    <h3 class="text-center">POST</h3>
      
        @if ($post)
               <span><b>Title:</b> {{$post->title}}</span><br>
          <span><b>Description:</b>{{$post->description}}</span><br>
          <span><b>Publish:</b>{{$post->is_publish}}</span><br>
          <span><b>Active:</b>{{$post->is_active}}</span><br>
        @else
            <h3 class="text-center">No POST found</h3>
        @endif
       

    
    </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script>
 $('#form').parsley();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
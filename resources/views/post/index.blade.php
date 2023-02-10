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
      <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

</head>
<body>
    
    <div class="row">
    <div class="col-md-6 offset-3 mt-5" >
    <h3 class="text-center">POSTS</h3>
    <a href=" {{ route('posts.create')}}" class="btn btn-info mb-3" >Create New Post</a>
        @if ( count($posts) > 0)
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Pulish</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>

      

    </tr>
  </thead>
  <tbody>

    @foreach ($posts as $post )
       <tr>
        <td> {{$post->id }}</td>
        <td> {{$post->title }}</td>
        <td> {{Str::limit($post->description, '10' , '...') }}</td>
        <td> {{$post->is_publish ==1 ? 'Yes' : 'No' }}</td>
        <td> {{$post->is_active ==1 ? 'Yes' : 'No' }}</td>
        <td id="outer">
            <a href=" {{ route('posts.show',$post->id) }}" class="btn btn-success"><i class="fa-solid fa-eye inner"></i></a>
            <a href=" {{ route('posts.edit' , compact('post'))}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square inner"></i></a>
            <form method="POST" action="{{ route('posts.destroy' , compact('post'))}}" class="inner">
              @csrf
              @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
            </form>
            @if ($post->Trashed())
               <a href=" {{ route('posts.soft-delete' , $post->id)}}" class="btn btn-warning"><i class="fa-solid fa-undo inner"></i></a>
            @endif

            
        </td>
       </tr>
    
    @endforeach
    {{-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>

    </tr> --}}
   
  </tbody>
</table>
        
 @else
    <h1 class="text-center text-danger mt-5 "> No Posts Available</h1>
            
    @endif
    
    {{-- {{$posts->render()}} --}}
    {{$posts->links()}}
       

    
    </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script>
 $('#form').parsley();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
  $.toast.options = {
        text: '',
        heading: '',
        showHideTransition: 'fade',
        allowToastClose: true,
        hideAfter: 3000,
        loader: true,
        loaderBg: '#9EC600',
        stack: 5,
        position: 'bottom-left',
        bgColor: true,
        textColor: false,
        textAlign: 'left',
        icon: false,
        beforeShow: function () {},
        afterShown: function () {},
        beforeHide: function () {},
        afterHidden: function () {},
        onClick: function () {}
    };
</script>
<script>
  // @if (Session::has('alert-success'))
  //   toastr["success"]("({ Session::get('alert-success' )})");
  // @endif


</script>
<script>
  @if(Session::has('alert-success'))
      $.toast({
        text: 'Post is created Successfully...',
        icon: 'success'
    })  
    @endif
      @if(Session::has('alert-info'))
     $.toast({
        text: 'Post updated Successfully...',
        icon: 'info'
    })   
@endif
  @if(Session::has('alert-success-del'))
      $.toast({
        text: 'Post is deleted Successfully...',
        icon: 'success'
    })  
    @endif
    @if(Session::has('alert-success-und'))
      $.toast({
        text: 'Post is Recovered Successfully...',
        icon: 'info'
    })  
    @endif

</script>
</body>
</html>
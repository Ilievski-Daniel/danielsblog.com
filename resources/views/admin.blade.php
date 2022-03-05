<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="/css/bootstrapAdmin.min.css" rel="stylesheet">
    <link href="/css/styleAdmin.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Daniel's Blog</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Daniel Ilievski</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="#home" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item">
                        <a href="/add-category" class="nav-link"><i class="fa fa-laptop me-2"></i>Add category</a>
                    </div>
                    <div class="nav-item">
                        <a href="/add-post" class="nav-link"><i class="fa fa-laptop me-2"></i>Add post</a>
                    </div>
                </div>
            </nav>
        </div>

        {{-- Dashboard header --}}
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" id="#home">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <h3 style="margin-left: 1%; color: darkmagenta !important;" class="text-primary mb-0"> Admin Panel </h3>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Daniel Ilievski</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Edit Profile</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- Dashboard body --}}

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center text-sm-start">
                            <table class="table table-striped">
                                <h5 class="text-primary">Posts admin</h5>
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Post name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr> 
                                        <th>{{$post->id}}</th>
                                        <td>{{$post->author}}</td>
                                        <td><a style="color: #292b2c;" href="/post/{{$post->id}}">{{$post->postName}}</a></td>
                                        <td><a href="/edit-post/{{$post->id}}">📝</a></td>
                                        <td>        
                                            <form action="/delete-post/{{$post->id}}" method="post">
                                                @csrf
                                                {{method_field('DELETE');}}
                                                <input style="border:0;" type="submit" name="submit" value="🗑️">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>  
                              
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center text-sm-start">
                            <table class="table table-striped">
                                <h5 class="text-primary">Categories admin</h5>
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Post name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr> 
                                        <th>{{$category->id}}</th>
                                        <td><a style="color: #292b2c;" href="/post/{{$category->id}}">{{$category->name}}</a></td>
                                        <td>{{$category->created_at}}</td>
                                        <td><a href="/edit-category/{{$category->id}}">📝</a></td>
                                        <td>        
                                            <form action="/delete-category/{{$category->id}}" method="post">
                                                @csrf
                                                {{method_field('DELETE');}}
                                                <input style="border:0;" type="submit" name="submit" value="🗑️">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>  
                              
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start" style="margin-bottom: 2vh;">
                            &copy; <a href="/">Daniel's Blog</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/chart/chart.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/js/mainAdmin.js"></script>
</body>

</html>
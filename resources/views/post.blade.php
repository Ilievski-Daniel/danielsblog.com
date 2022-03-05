<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Post {{$id}}</title>
    <link rel="icon" href="/img/core-img/favicon.ico">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/classy-nav.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                        <h5 class="title">Subscribe to newsletter</h5>
                        <form action="#" class="newsletterForm" method="post">
                            <input type="email" name="email" id="subscribesForm2" placeholder="Your e-mail here">
                            <button type="submit" class="btn original-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Navigation --}}
    <header class="header-area">
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-center">
                        {{-- Logo of the blog --}}
                        <div class="logo-area text-center">
                            <div class="container h-100">
                                <div  class="row h-100 align-items-center">
                                    <div class="col-12">
                                        <a href="/" class="original-logo"><image img style="width:80% !important;" src="/img/core-img/logo.png" alt=""></a></image>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        {{-- Menu --}}
                        <div class="classy-menu" id="originalNav">
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            {{-- Navigation --}}
                            <div class="classynav">
                                <ul><li><a href="/">Home</a></li>
                                    @foreach ($categories as $category)
                                    <li style="margin-top: 25px;"><a href="/">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>

                                <!-- Search Form  -->
                                <div id="search-wrapper">
                                    <form action="#">
                                        <input type="text" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    {{-- Post information --}}
    <div class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-blog-thumbnail">
                        <image img src="/img/blog-img/3.jpg" alt="Post Image" width="500" height="600" style="margin-bottom: 1vh; margin-top: 5vh; border-radius: 15px;"></image>
                        <h6 style="margin-bottom: 1vh">Published: {{date('d', strtotime($post->created_at))}}<span> {{date('M', strtotime($post->created_at))}} by {{$post->author}} </h6>
                        <center><hr style="width:35%; margin-top: 1vh"></center>
                        <div class="post-date">
                            <h5>{{$post->postName}}</h5>
                        </div>
                        <center><hr style="width:50%;"></center> 
                        <p style="font-size: 15px">{{$post->content}}</p>
                        <center><hr style="width:50%;"></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    {{-- Comments section --}}
    <div class="text-center">
        <center><hr style="width:100%; border-top: 3px solid gray;"></center>
            <div class="single-blog-thumbnail">
                <h5> Comments section: </h5>
                @foreach ($comments as $comment)
                @foreach ($comm as $com)
                    @if ($comment->comment_id == $com->id)
                        <h6 class="col-6" style="display: inline"> {{$com->content}}</h6>
                        <p> Posted by: {{$com->author}} | {{$com->created_at}} </p>   
                    @endif  
                @endforeach
                @endforeach
            </div>
        </div>
    </div>


    {{-- Post a comment section --}}
    <div class="container-contact100">
		<div class="wrap-contact100">
            <div class="single-blog-thumbnail">
                <form class="contact100-form validate-form" action={{$id}} method="POST">
                    <center><hr style="width:100%; border-top: 3px solid gray;"></center>
                    <div class="wrap-input100 text-center">
                        <h6> Author: </h6>
                        <textarea name="comment" cols="50" rows="1" placeholder="Enter your name.."></textarea>
                    </div>
                    <div class="wrap-input100 text-center">
                        <h6> Comment </h6>
                        <textarea name="comment" cols="50" rows="5" placeholder="Enter comment.."></textarea>
                    </div>
                    <div class="wrap-input100 text-center">
                        <input class="btn btn-primary" style="padding-left: 3vh; padding-right: 3vh; margin-bottom: 1vh; margin-top: 1vh;" type="submit" value="Post comment" name="submit">
                    </div>
                    <center><hr style="width:100%; border-top: 3px solid gray;"></center>
                </form>
            </div>
        </div>
    </div>
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-bottom: 2vh;">
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> Daniel's Blog | All rights reserved</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/active.js"></script>

</body>
</html>
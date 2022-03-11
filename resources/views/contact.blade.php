<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daniel's Blog</title>
    <link rel="icon" href="/img/core-img/favicon.ico">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/classy-nav.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
</head>

<body>
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
                                        <a href="index.html" class="original-logo"><image img style="width:80% !important;" src="/img/core-img/logo.png" alt=""></a></image>
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
                                    <li><a href="/">{{ $category->name }}</a></li>
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

    <div class="container py-4">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
  
      <!-- Name input -->
      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" id="name" type="text" placeholder="Name" required/>
      </div>
  
      <!-- Email address input -->
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Email Address</label>
        <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" required />
      </div>
  
      <!-- Message input -->
      <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" required></textarea>
      </div>

      <div class="mb-3">
          <input class="btn btn-primary" type="submit" value="Send Message"></input>
      </div>
    </form>
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
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
  
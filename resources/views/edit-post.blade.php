<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit post</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{$id}}" method="POST">
                @csrf
				<span class="contact100-form-title">
					Edit post # {{$id}}
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Post name is required">
					<span class="label-input100">Post </span>
					<input class="input100" type="text" name="postName" placeholder="Enter post name" value="{{$post->postName}}">
					<span class="focus-input100"></span>
				</div>
                
                <div class="wrap-input100 validate-input" data-validate = "Author is required">
					<span class="label-input100">Author </span>
					<input class="input100" type="text" name="author" placeholder="Enter author name" value="{{$post->author}}">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Category {{$category_id->post_id}}</span>
					<div>
						<select class="selection-2" name="category">
                            @foreach ($categories as $category)
                                @if ($category->id == $category_id->category_id)
                                    <option value="{{$category->name}}" @selected(true)>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                @endif
                                
                            @endforeach
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
                
                <div class="wrap-input100 validate-input" data-validate = "Short description is required">
					<span class="label-input100">Short description</span>
					<input class="input100" type="text" name="shortDesc" placeholder="Enter short description.." value="{{$post->shortDesc}}">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Content is required">
					<span class="label-input100">Content</span>
					<textarea class="input100" name="content" placeholder="Enter content here...">{{$post->content}}</textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
                        <input style=" background-color: rgb(4, 65, 105);" type="submit" name="submit" class="contact100-form-btn" value="Submit post">
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>

	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

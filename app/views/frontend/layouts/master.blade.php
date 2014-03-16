<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html lang="en-GB"> <!--<![endif]-->
<head>
	
	{{-- BEGIN HEAD  --}}
	@include('frontend.partials._head')
	{{-- END HEAD--}}

</head>
	<body class="index">

		<header id="header">

			{{-- BEGIN TOP BAR WITH SOCIAL AND CONTACT INFORMATION --}}
			@include('frontend.partials._social')
			{{-- END TOP BAR WITH SOCIAL AND CONTACT INFORMATION--}}

			{{-- BEGIN NAVIGATION --}}
			@include('frontend.partials._nav')
			{{-- END NAVIGATION --}}

		</header>{{-- #header --}}

		{{-- BEGIN POSITION 1 : SUITABLE FOR SLIDER (OPTIONAL) --}}
		@yield('position1')
		{{-- BEGIN POSITION 1 : SUITABLE FOR SLIDER (OPTIONAL) --}}

	
		<div id="page-content" role="main">

			{{-- BEGIN POSITION 2 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}
			@yield('position2')
			{{-- END POSITION 2 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}

			{{-- BEGIN POSITION 3 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}
			@yield('position3')
			{{-- END POSITION 3 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}

			{{-- BEGIN POSITION 4 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}
			@yield('position4')
			{{-- END POSITION 4 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}

			{{-- BEGIN POSITION 5 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}
			@yield('position5')
			{{-- END POSITION 5 : SUITABLE FOR INSIDE MAIN BODY (OPTIONAL) --}}

		</div>


		{{-- BEGIN POSITION 6 : SUITABLE FOR OUTSIDE MAIN BODY (OPTIONAL) --}}
		@yield('position6')
		{{-- END POSITION 6 : SUITABLE FOR OUTSIDE MAIN BODY (OPTIONAL) --}}
		

		<footer id="footer">
			
		    {{-- BEGIN FOOTER --}}
			@include('frontend.partials._footer')
			{{-- BEGIN FOOTER --}}

		</footer>{{-- #footer --}}

		<a class="btn" id="toTop" href="#"></a>

		{{-- BEGIN TAIL --}}
		@include('frontend.partials._tail')
		{{-- BEGIN TAIL --}}

	</body>
</html>

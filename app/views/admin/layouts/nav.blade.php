<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-inverse navbar-static-top">
		{{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{{$url}}}">PROJECT NAME</a>
					{{--
					<a href="{{{$url}}}" title="">
						<img src='{{asset('img/logo.png')}}' alt='logo' height='34' width='224' />
					</a>
					--}}
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">					

						<li class="remove_tap @if ($location == 'home') active @endif"><a href="{{{$url}}}">ONE</a></li>

						<li class="remove_tap @if ($location == '') active @endif"><a href="#about">TWO</a></li>
						<li class="remove_tap @if ($location == '') active @endif"><a href="#contact">THREE</a></li>
						<li class="dropdown remove_tap @if ($location == '') active @endif">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">FOUR <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class="remove_tap @if ($location == '') active @endif"><a href="#">FOUR A</a></li>
								<li class="remove_tap @if ($location == '') active @endif"><a href="#">FOUR B</a></li>
								<li class="remove_tap @if ($location == '') active @endif"><a href="#">FOUR C</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">FOUR SUB-HEADER</li>
								<li class="remove_tap @if ($location == '') active @endif"><a href="#">FOUR D</a></li>
								<li class="remove_tap @if ($location == '') active @endif"><a href="#">FOUR E</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>
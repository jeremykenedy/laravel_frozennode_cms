<body>

	<input type="hidden" id="url" value="{{{ $url }}}" />

	{{-- These sections are set up to be easily extended or replaced. --}}

	@section('layout_nav')
		@include('layouts.nav')
	@show	

	@section('layout_content')
		@yield('content')
	@show

	@section('layout_footer')
		@include('layouts.footer')
	@show

	@section('js')
		@include('layouts.scripts')
	@show

	{{-- Loading scripts here can make the initial page load seem faster, but it temporarily breaks pages that use JS to modify the UI, e.g. a map. --}}

</body>

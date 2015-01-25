<body>

	<input type="hidden" id="url" value="{{{ $url }}}" />

	{{-- These sections are set up to be easily extended or replaced. --}}

	@section('admin_layout_nav')
		@include('admin.layouts.nav')
	@show	

	@section('admin_layout_content')
		@yield('admin_content')
	@show

	@section('admin_layout_footer')
		@include('admin.layouts.footer')
	@show

	@section('admin_js')
		@include('admin.layouts.scripts')
	@show

	{{-- Loading scripts here can make the initial page load seem faster, but it temporarily breaks pages that use JS to modify the UI, e.g. a map. --}}

</body>

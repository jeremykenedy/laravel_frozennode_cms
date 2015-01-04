<head>
	<meta charset="utf-8">
	<title>
		@section('page_title')
			@if (isset($page->title) && $page->title)
				{{{ $page->title }}} | {{{ $company }}}
			@else
				{{--{ $company }--}}
				DEFAULT FALLBACK TITLE
			@endif
		@show
	</title>

	{{--  META TAGS  --}}
	@section('page_meta')
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->		
		@if(isset($page->meta_desc) && $page->meta_desc)
			<meta name="description" content="{{{ $page->meta_desc }}}"/>
		@endif
		@if(isset($page->meta_keywords) && $page->meta_keywords)
			<meta name="keywords" content="{{{ $page->meta_keywords }}}" />
		@endif	
		<meta name="author" content="Jeremy Edgar Kenedy">
		<meta name="google-site-verification" content="" />    
		<meta name="msvalidate.01" content="" />    
		<meta name="robots" content="index, follow">
		<meta name="GOOGLEBOT" content="index follow"/>
		<meta http-equiv="Page-Enter" content="revealtrans(duration=0.01)" />
	@show

	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

	{{--  CSS  --}}
	@section('css')
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.min.css') }}
		{{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}
        {{ HTML::style('css/style.css') }} 
		<!--[if IE 8]>{{ HTML::style('css/ie8.css') }}<![endif]-->
		<!--[if lt IE 9]>{{ HTML::style('css/ie8.css') }}<![endif]-->   
		<!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->		
	@show

	{{-- JSCRIPT - MORE IN SCRIPTS.BLADE>PHP  --}}
	@section('head_js')
		{{ HTML::script('js/modernizer.min.js') }}	
		<!--[if lt IE 9]>
			{{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
			{{ HTML::script('//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js') }}
			{{ HTML::script('//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js') }}
			{{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->	
	@show

</head>
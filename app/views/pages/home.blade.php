@extends('layouts.master')

@section('page_id','laravel_homepage')

@section('title','Home Page')

@section('content')

	@section('elements_carousel')
		@include('elements.carousel')
	@show

    <div class="container marketing">
    	
	 	@section('tripart_content')
			@include('elements.tripart')
		@show   

		<hr class="featurette-divider">

		@section('elements_first_two_part_right')
			@include('elements.twopart-right')
		@show

      	<hr class="featurette-divider">

		@section('elements_second_two_part_left')
			@include('elements.twopart-left')
		@show

      	<hr class="featurette-divider">

		@section('elements_third_two_part_right')
			@include('elements.twopart2-right')
		@show

      	<hr class="featurette-divider">

    </div>

@stop
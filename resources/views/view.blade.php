@extends('layouts.header')

@section('content')

<div class=" text-center">
	<div align="right">
		
	</div>
	<br />

	<h3>Club Name - {{ $data->name }} </h3>
	<img src="{{ URL::to('/') }}/images/{{ $data->image }} " class="img-thumbnail" />
	<br></br>
	<a href="{{ route('club.index') }}" class="btn btn-default">Back</a>
</div>
@endsection

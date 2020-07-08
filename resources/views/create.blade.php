@extends('layouts.header')

@section('content')

<div class="container">	
	<div class="col-md-8 mx-auto">
			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
				<div >
					<a href="{{ route('club.index') }}" class="btn btn-default">Back</a>
				</div>
				<div class="row justify-content-center pt-3">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">{{ __('Add new club') }}</div>
				
								<div class="card-body">
								<form method="POST" action="{{route('club.store')}}" enctype="multipart/form-data">
										@csrf
										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Club Name') }}</label>
											<div class="col-md-6">
												<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
				
												@if ($errors->has('name'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('name') }}</strong>
													</span>
												@endif
											</div>
										</div>
									
										<div class="form-group row">
											<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
				
											<div class="col-md-6">
												<input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"  required>
												@if ($errors->has('image'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('image') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>
									 
									</div>
				
										<div class="form-group row mb-0">
											<div class="col-md-6 offset-md-4 mt-4">
												<button type="submit" class="btn btn-primary">
													{{ __('Save club Details') }}
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
	</div>





</div>


@endsection




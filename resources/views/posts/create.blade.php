@extends('layouts.app') @section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li> @endforeach
				</ul>
			</div>
			@endif
			<div class="card">
				<div class="card-header">Crear post</div>


				<div class="card-body">
					<form action="{{route('posts.store')}}" method="POST">
						@csrf
						<p>
							<label for="titol">Titol</label> <input type="text" id="titlte"
								name="title" class="@error('titol') is-invalid @enderror">
						</p>
						<p>
							<label for="contingut">Contingut</label><input type="text"
								id="content" name="content"
								class="@error('contingut') alert-danger @enderror">
							@error('content')
						
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						<p>
						<label for="user_id">Usuari</label><select id="user_id"
								name="user_id"> @foreach ($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select> </p>
						
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

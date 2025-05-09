@extends('app')

@section('contents')
<section>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card-body mt-5 mb-5">
				<form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="" class="form-label">File</label>
						<input type="file" class="form-control" id="" name="file">
						@error('file')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<table>
				<tbody>
					@foreach ($files as $file)
					<td><img style="width:100px" src="{{ asset($file->file_path) }}" alt=""></td>
					@endforeach
				</tbody>
			</table>
			<hr>
			<table>
				<tbody>
					<a href="{{ route('file.download') }}">Download File</a>
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
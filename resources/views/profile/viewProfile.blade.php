@extends('layouts.app')

@section('content')
	<div class="container">
		@foreach ($user as $profile)
			<div class="main-body">
				<div class="row gutters-sm">
					<div class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="align-items-center text-center">
									<img src="{{ asset('img/'.$profile->image) }}" alt="Profile Picture" class="rounded-circle" width="150">
									<div class="mt-3">
										<h4 class="text-color-title">{{ $profile->name }}</h4>
										<p class="text-secondary mb-1">{{ $profile->description }}</p>
										<hr>
										<div class="row">
											<div class="col-sm-4">
												<h6>Tutees</h6>
												<h4>3</h4>
											</div>
											<div class="col-sm-4">
												<h6>Tutored</h6>
												<h4>18</h4>
											</div>
											<div class="col-sm-4">
												<h6>Ratings</h6>
												<h4>4.8</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 col-sm-12 align-items-center text-center mb-3 mt-2">
										<h3 class="text-color-title"><b>Profile Information</b></h3>
									</div>
									<div class="col-sm-3">
										<h6 class="mb-0 pl-2">Full Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<h6 class="pl-2">{{ $profile->name }}</h6>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0 pl-2">Address</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<h6 class="pl-2">{{ $profile->address }}</h6>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0 pl-2">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<h6 class="pl-2">{{ $profile->email }}</h6>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0 pl-2">Mobile</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<h6 class="pl-2">{{ $profile->mobile }}</h6>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<h6 class="mb-0 pl-2">Sex</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<h6 class="pl-2">{{ $profile->gender }}</h6>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#editProfileInfoModal">
											<i class="fa fa-edit pr-2" style="color: #ffffff"></i>
											Edit
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<div class="container">
									<div class="row mt-3">
										<div class="col-md-12 col-sm-12 align-items-center text-center">
											<h3 class="text-color-title"><b>Offered Subjects</b></h3>
											<a href="subject/create" class="btn btn-primary float-right"><i class="fa fa-folder-plus pr-2" style="color: #ffffff"></i>Add Subject</a>
										</div>
										@foreach ($subject as $sub)
											<div class="col-md-12 col-sm-12">
												<hr  class="mb-5 hr-border">
												<a class="float-right" href="subject/{{ $sub->id }}/edit">
													<i class="fa fa-edit" style="color: #007c00"></i>
													<b class="text-color-edit">Edit</b>
												</a>
												<br>
												<h4 class="text-color-primary"><b>{{ $sub->subject }}</b></h4>
												<h6>{{ $sub->schedule }}</h6>
												<h6><i>{{ $sub->description }}</i></h6>
												<div class="container-fluid pt-3">
													<h5 class="text-color-primary"><b>Topics</b></h5>
													<div class="m-3">
														@foreach ($topics as $topicsCollection)
															@foreach ($topicsCollection as $topicVal)
																@if ( $topicVal->subjectID == $sub->id)
																	<div class="mb-3">
																		<h6 class="text-color-primary"><b>{{ $topicVal->topic }}</b></h6>
																		<h6>{{ $topicVal->description }}</h6>
																		<hr>
																	</div>
																@endif
															@endforeach
														@endforeach
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			{{-- <<<<  Modal  >>> --}}

			{{-- Edit profile information modal --}}
			<div class="modal fade" id="editProfileInfoModal" tabindex="-1" role="dialog" aria-labelledby="editProfileInfoModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Update Profile Informataion</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<div>
								<form action="/profile/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')

									<div class="align-items-center text-center" id="updateImg">
										<div class="align-items-center text-center" id="imgPreview">
											<img src="{{ asset('img/'.$profile->image) }}" alt="Profile Picture" class="rounded-circle imgDef" width="150">
											<img src="" alt="New Profile Picture" class="rounded-circle imgPrev" width="150">
										</div>
										<div class="mt-3">
											<input type="file" name="imgInput" id="imgInput" accept="image/*">
										</div>
										<div class="imgWarning mt-2">
											<h6 class="text-danger">
												Invalid Image File <br>
												Please select another image file.
											</h6>
										</div>
									</div>
									<hr>
									<div class="form-group mt-2">
										<label for="nameInput"><b>Full Name:</b></label>
										<input class="form-control" type="text" name="nameInput" value="{{ $profile->name }}" required>
									</div>
									<div class="form-group mt-2">
										<label for="addressInput"><b>Address:</b></label>
										<input class="form-control" type="text" name="addressInput" value="{{ $profile->address }}" required>
									</div>
									<div class="form-group mt-2">
										<label for="emailInput"><b>Email:</b></label>
										<input class="form-control" type="text" name="emailInput" value="{{ $profile->email }}" required>
									</div>
									<div class="form-group mt-2">
										<label for="mobileInput"><b>Mobile:</b></label>
										<input class="form-control" type="text" name="mobileInput" value="{{ $profile->mobile }}" required>
									</div>
									<div class="form-group mt-2">
										<label for="sexInput"><b>Sex:</b></label>
										<select class="form-control" name="sexInput" required>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="form-group mt-2">
										<label for="descInput"><b>Description:</b></label>
										<textarea class="form-control" name="descInput" id="" rows="3">{{ $profile->description }}</textarea>
									</div>
									<hr>
									<div>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<input type="submit" class="btn btn-primary">
									</div>
								</form>
							</div>
						</div>

						<div class="modal-footer">
						</div>
				  	</div>
				</div>
			</div>


			{{-- Add Subject Modal --}}
			{{-- <div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="editProfilePicModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Add Subject</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<div class="align-items-center text-center">
								
							</div>
						</div>

						<div class="modal-footer">
						</div>
				  	</div> 
				</div>
			</div> --}}





		@endforeach
	</div>
@endsection
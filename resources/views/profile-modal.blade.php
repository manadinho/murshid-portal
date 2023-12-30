<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <img src="{{ route('profile.image', ['username' => auth()->user()->name]) }}" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 50%;">
                    </div>
                    <div class="col-md-8">
						<!-- Profile Modal For Google Uer -->
						<form method="post" action="{{ route('password.update') }}">
							@csrf
							@method('put')
                            <label for="name" >Username</label>
							<input id="name" name="new_name" type="text" class="form-control" value="{{ auth()->user()->name }}" required onchange="updateUser(this)">
                            <label for="profileEmail">Email</label>
                            <input type="text" id="profileEmail" class="form-control" readonly value="{{ auth()->user()->email }}">
							<hr>
							@if(auth()->user()->password != null)
								<label for="profilePassword">Old Password</label>
								<input type="password" name="old_password" id="profilePassword" class="form-control">
							@endif
							<label for="NewprofilePassword">New Password</label>
							<input type="password" name="new_password" id="NewprofilePassword" class="form-control">
							<label for="profileConPassword">Confirm Password</label>
							<input type="password" name="new_password_confirmation" id="profileConPassword" class="form-control">
							<button type="submit" class="btn btn-primary mt-3 ml-19">Save Changes</button>							
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="avatar-container display-modal">
							<span class="avatar-text">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
						</div>                      
                    </div>
                    <div class="col-md-8">
                        <form method="post" action="{{ route('password.update') }}">
							@csrf
							@method('put')
                            <label for="profileName">Name</label>
							<input id="name" name="new_name" type="text" class="form-control" value="{{ auth()->user()->name }}" required onchange="updateUser(this)">
                            <label for="profileEmail">Email</label>
                            <input type="text" id="profileEmail" class="form-control" readonly value="{{ auth()->user()->email }}">
                            <hr>
                            <h5>Change Password</h5>
                            @if(auth()->user()->password != null)
                                <label for="currentPassword">Current Password</label>
                                <div class="input-group">
                                    <input type="password" name="old_password" id="profilePassword" class="form-control">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" id="currentPasswordToggle">
                                        <i class="bi bi-eye-slash-fill"></i>
                                    </button>
                                </div>
                            @endif
                            <label for="newPassword">New Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password" id="NewprofilePassword" class="form-control">
                                <button type="button" class="btn btn-outline-secondary toggle-password" id="newPasswordToggle">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password_confirmation" id="profileConPassword" class="form-control">
                                <button type="button" class="btn btn-outline-secondary toggle-password" id="confirmPasswordToggle">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/main.js') }}"></script>



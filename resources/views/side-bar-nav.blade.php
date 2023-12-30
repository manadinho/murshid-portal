<div class="container-fluid">
	<div class="row">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 sidebar">
					<div class="user-profile p-1 position-relative">
						<img src="{{ route('profile.image', ['username' => auth()->user()->name]) }}"  alt="Profile Image">
						<div class="ms-2">
						<span >{{ auth()->user()->name }}</span>
						<span class="span-email">{{ auth()->user()->email }}</span>
					</div>
						<button class="btn btn-link dropdown-toggle position-absolute top-0 end-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
						</button>
						<ul class="dropdown-menu dropdown-menu-end custom-dropdown" aria-labelledby="dropdownMenuButton">
							<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
							<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Settings</a></li>
							<li><hr class="dropdown-divider"></li>
							<li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<x-dropdown-link :href="route('logout')"
												onclick="event.preventDefault();
												this.closest('form').submit();">
											{{ __('Log Out') }}
									</x-dropdown-link>
								</form>
							</li>                    
						</ul>
					</div>
					<hr>
					<a href="{{  route('dashboard') }}"  class="btn mt-3 d-block col-12 btn-transparent text-blue-grey {{ request()->is('dashboard') ? 'active #373e47' : '#22272e' }}">
						<i class="fa fa-home"></i> Dashoard
					</a>
					<a  href="{{  route('projects.config.manager') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey {{ request()->is('project/config') ? 'active #373e47' : '#22272e' }}">
						<i class="fa fa-cog"></i> Setting
					</a>
					<a href="{{  route('projects.home') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey {{ request()->is('project/home') ? 'active #373e47' : '#22272e' }}">
						<i class="fa fa-folder"></i> Projects
					</a>
					<div class="toggle">
						<div class="toggle-bar">
							<label class="switch">
								<input type="checkbox" id="modeToggle">
								<span class="slider"></span>
							</label>
						</div>
					</div>
				</div>
@include('profile-modal')
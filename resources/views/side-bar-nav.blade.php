<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 sidebar">
			<div class="user-profile mt-3 position-relative">
				<img src="/../zaid.jpg" alt="Profile Picture" class="img-fluid rounded-circle">
				<span class="ms-2">{{ Auth::user()->name }}</span>
				<button class="btn btn-link dropdown-toggle position-absolute top-0 end-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
				</button>
				<ul class="dropdown-menu dropdown-menu-end custom-dropdown" aria-labelledby="dropdownMenuButton">
					<li>
						<a class="dropdown-item" href="#">Profile</a>
					</li>
					<li>
						<a class="dropdown-item" href="#">Settings</a>
					</li>
					<li>
						<hr class="dropdown-divider">
					</li>
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
			<a href="{{  route('projects.home') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey">
				<i class="fa fa-home"></i> Home
			</a>
			<a href="{{  route('projects.config.manager') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey">
				<i class="fa fa-cog"></i> Setting
			</a>
			<a href="{{  route('dashboard') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey">
				<i class="fa fa-folder"></i> Projects
			</a>
			<div class="toggle-bar">
				<label class="switch">
					<input type="checkbox" id="modeToggle">
					<span class="slider"></span>
				</label>
			</div>
		</div>
		

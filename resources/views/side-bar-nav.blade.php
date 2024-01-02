		<div class="container-fluid">
			<button button class="btn btn-primary d-block d-sm-none mt-3 expand-btn" id="sidebarToggle">
				<i class="fa fa-bars"></i>
			</button>
			<div class="row">
				<div class="col-md-2 col-sm-4  sidebar">
					<div class="user-profile mt-3 position-relative">
						<div class="avatar-container display-nav">
							<span class="avatar-text">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
						</div>						
						<div class="ms-2">
							<span class="d-inline-block text-truncate" style="max-width: 110px;">{{ auth()->user()->name }}</span>
							<span class="d-inline-block text-truncate" style="max-width: 110px;">{{ auth()->user()->email }}</span>
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
												this.closest('form').submit();"
												class="link-anc">
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
					<a href="{{  route('projects.home') }}" class="btn mt-3 d-block col-12 btn-transparent text-blue-grey {{ request()->is('project/index') ? 'active #373e47' : '#22272e' }}">
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
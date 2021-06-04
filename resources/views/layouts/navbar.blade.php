<header class="header">
	<div class="header_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo"><a href="/"><img style="width:50px;height:50px;margin-top:-5px;margin-right:10px;" src="{{asset('assets/User/images/shirt.png')}}">Boxcraft.id</a></div>
						<nav class="main_nav">
							<ul>
								@auth
								<li class="hassubs active">
									<?php 
                                    	$id = Auth::user()->id;
                                    	$notif_count = Auth()->user()->unreadNotifications->count();
                                    	$notifications = DB::table('user_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                            		?>
									<a class="fa fa-bell-o"></a>
									<a href="/home"><span class="badge badge-pill badge-danger">{{$notif_count}}</span></a>
									<ul >
										<center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
										@foreach($notifications as $notif)
											<li>{!!$notif->data!!}</li>
											<br>
										@endforeach                                  
									</ul>
								</li>
								@endauth
								<li>
									<a href="/home">Home</a>
								</li>
								<li>
								@auth
								<a href="/transaksi/{{ Auth::user()->id  }}">Transaksi</a>
								@endauth
								</li>
								@guest
								<li class="hassubs active">
									<a class="fa fa-bell-o" href="/home"><span class="badge badge-pill badge-danger">0</span></a>
									<ul>
										<li><a href="#">Login Terlebih Dahulu!</a></li>
									</ul>
								</li>
								@endguest
								@guest
								@if (Route::has('register'))
									<li><a href="{{ route('register') }}">Register</a></li>
								@endif
									<li><a href="{{ route('login') }}">Login</a></li>
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link, dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;">
										<img src="/uploads/avatars/{{ Auth::user()->profile_image }}" style="width:32px; height:32px; position:absolute; top:-4px; left:12px; border-radius:50%">
										{{ Auth::user()->name }} <span class="caret"></span>
									</a>
	
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="/profile">
											Profile
										 </a>

										<a class="dropdown-item" href="{{ url('/user/logout') }}"
										   onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
										
										<form id="logout-form"  action="{{ url('/user/logout') }}" method="GET" style="display: none;">
											@csrf
										</form>
										
									</div>
								</li>
								@endguest
							</ul>
						</nav>
						<div class="header_extra ml-auto">
							@auth
							<div class="shopping_cart">
								<a href="/cart">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
										<g>
											<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
												c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
												C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
												H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
												c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
										</g>
									</svg>
									<div>Cart <span class="badge badge-pill badge-danger" id="jumlahcart">{{Auth::user()->cart->where('status','=','notyet')->count()}}</span></div>
								</a>
							</div>
							@endauth
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

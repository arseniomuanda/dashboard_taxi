		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rocker</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu text-uppercase fw-bold" id="menu">
				<li>
					<a href="/">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Home</div>
					</a>
				</li>
				<li class="menu-label">Modulos</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Menu Principal</div>
					</a>
					<ul style="background-color: #d8d7adee;">
						<li> <a href="/vehicles"><i class="bx bx-building-house"></i>Viaturas Registadas</a>
						</li>
						<li> <a href="/vehicles/news"><i class="bx bxs-user-plus"></i>Novas Viaturas</a>
						</li>
						<li>
							<a href="/drivers"><i class='bx bx-briefcase'></i>Motoristas
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="/config">
						<div class="parent-icon"><i class='bx bx-cog'></i>
						</div>
						<div class="menu-title">Configurações</div>
					</a>
				</li>
				<li class="menu-label">Data - Hora</li>
				<li class=" bottom-0">

					<div class="menu-title p-md-4">13/12/2021 - 09:40:32</div>
				</li>
				<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret
												position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <!-- 
													Este spar só tem de aparecer quando haver uma notificaçao
													<span class="alert-count">0</span> -->
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notificações</p>
											<p class="msg-header-clear ms-auto">Todas Marcadas como lidas</p>
										</div>
									</a>
									<div class="header-notifications-list">

										<!-- <a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="notify bg-light-info text-info"><i class="bx
																	bx-home-circle"></i>
															</div>
															<div class="flex-grow-1">
																<h6 class="msg-name">New Product Approved <span
																		class="msg-time float-end">2 hrs ago</span></h6>
																<p class="msg-info">Your new product has approved</p>
															</div>
														</div>
													</a> -->
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">Ver todas as notificações</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret
												position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<!-- <span class="alert-count">8</span> -->
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
										</div>
									</a>
									<div class="header-message-list">

										<!-- <a class="dropdown-item" href="javascript:;">
														<div class="d-flex align-items-center">
															<div class="user-online">
																<img src="/assets/images/avatars/avatar-11.png"
																	class="msg-avatar"
																	alt="user avatar">
															</div>
															<div class="flex-grow-1">
																<h6 class="msg-name">Johnny Seitz <span class="msg-time
																		float-end">5 days
																		ago</span></h6>
																<p class="msg-info">All the Lorem Ipsum generators</p>
															</div>
														</div>
													</a> -->

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">Ver todas as mensagens</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle
										dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="/assets/images/avatars/avatar-2.png" class="user-img" alt="user
											avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Antônio Viegas</p>
								<p class="designattion mb-0">Administrador Geral</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" style="background-color: #d8d7adee;">
							<li><a class="dropdown-item" href="/user/1"><i class="bx
													bx-user"></i><span class="fw-bold">Perfil</span></a>
							</li>
							<li><a class="dropdown-item" href="/"><i class='bx
													bx-home-circle'></i><span class="fw-bold">Home</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><button class="dropdown-item" onclick="functions.logout()"><i class='bx
													bx-log-out-circle'></i><span class="fw-bold">Logout</span></button>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/lists">
				<i class="fa fa-home" aria-hidden="true"></i>&nbsp; UBringThis!
			</a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp; {{ Auth::user()->name }}
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/user">Perfil</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">sessió</li>
							<li><a href="/logout">Desconnectar</a></li>
						</ul>
					</li>
					<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Configuració</a></li>
					<li><a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbsp; Ajuda</a></li>
				@else
					<li><a href="/login"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Accedir</a></li>
					<li><a href="/register"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Registrar</a></li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->

	</div>
</nav>

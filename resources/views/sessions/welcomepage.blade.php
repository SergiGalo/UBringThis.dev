@extends('layouts.welcome')

@section('page_title', 'Inici')


@section ('content')

<section class="welcome-wrapper">
		<div class="welcome-message">
			<div class="welcome-bg">
			</div>
			<div class="welcome-text text-center">
				<p>UBringThis!</p>
				<div class="welcome-icon">
					<p>Llistes de compra participatives</p>
					<!-- <i class="fa fa-hand-o-right" aria-hidden="true"></i>
					<i class="fa fa-lemon-o" aria-hidden="true"></i>
					<i class="fa fa-beer" aria-hidden="true"></i>
					<i class="fa fa-glass" aria-hidden="true"></i>
					<i class="fa fa-gift" aria-hidden="true"></i>
					<i class="fa fa-birthday-cake" aria-hidden="true"></i>
					<i class="fa fa-shopping-basket" aria-hidden="true"></i> -->
				</div>
			</div>
		</div>
</section>

<section>
	<div class="welcome-info text-center">
		<div class="welcome-info-item">Crea i gestiona de forma senzilla llistes de la compra entre moltes persones.</div>
		<div class="welcome-info-item">Afegeix, assigna i selecciona productes.</div>
		<div class="welcome-info-item">Controla qui porta cada producte a l'esdeveniment.</div>
		<div class="welcome-info-item">Mira de forma ràpida la quantitat i preu de cada col·laborador.</div>
	</div>
</section>

<section>
	<div class="rrss-info text-center">
		<a href="#" class="welcome-info-item g-shadow">
			<i class="fa fa-facebook-square fb-icon" aria-hidden="true"></i>
		</a>
		<a href="#" class="welcome-info-item g-shadow">
			<i class="fa fa-twitter-square tw-icon" aria-hidden="true"></i>
		</a>
	</div>
</section>

@endsection

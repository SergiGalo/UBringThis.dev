@extends('layouts.welcome')

@section('page_title', 'Inici')


@section ('content')

<div class="welcome-wrapper">
		<div class="welcome-message text-center">
			<div class="welcome-text">
				<p>UBringThis!</p>
			</div>
			<div class="welcome-icon fa-2x">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				<i class="fa fa-lemon-o" aria-hidden="true"></i>
				<i class="fa fa-beer" aria-hidden="true"></i>
				<i class="fa fa-glass" aria-hidden="true"></i>
				<i class="fa fa-gift" aria-hidden="true"></i>
				<i class="fa fa-birthday-cake" aria-hidden="true"></i>
				<i class="fa fa-shopping-basket" aria-hidden="true"></i>
			</div>
		</div>
</div>

@endsection

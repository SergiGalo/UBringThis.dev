@extends('layouts.master')

@section('page_title', 'Llistes')


@section('sidebar')
<div class="sidebar-wrapper">

	<div class="btn-lists">
		<span>
			<a href="/lists/create" type="button" class="btn btn-success">
				<i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i>
			</a>
		</span>
	</div>

	<div class="lists-wrapper">
		<ul class="list-details">

			<li class="list-info">
				<p>
					<i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp; Llistes:
				</p>
			</li>

			@if (count($lists))
				@foreach($lists as $list)
				<?php
					$time = date('H:i', strtotime($list->event_date));
					$date = date('d-m-Y', strtotime($list->event_date));
				?>
					<a class="list-group-item" href="/lists/{{ $list->id }}">
						<li class="list-item">
							<p class="list-item-name">
								<span class="fa-stack fa-lg">
									<i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true"></i>
									<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
								</span>
								&nbsp; {{ $list->title }}
							</p>
							<span class="list-item-date">
								<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}
							</span>
							&nbsp;
							<span class="list-item-date">
								<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}
							</span>
						</li>
					</a>
				@endforeach
			@else
				<p class="text-muted">
					<i class="fa fa-frown-o" aria-hidden="true"></i>&nbsp;No tens cap llista creada.
				</p>
			@endif

			<li class="lists-own-title">
				<p>
					<i class="fa fa-sticky-note-o" aria-hidden="true"></i>&nbsp; Col·laboracions:
				</p>
			</li>

			@if (count($collaborations))
				@foreach($collaborations as $collaboration)
				<?php
					$time = date('H:i', strtotime($collaboration->event_date));
					$date = date('d-m-Y', strtotime($collaboration->event_date));
				?>
					<a class="list-group-item" href="/lists/{{ $collaboration->id }}">
						<li class="list-item">
							<p class="list-item-name">
								<span class="fa-stack fa-lg">
									<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
									<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
								</span>
								&nbsp; {{ $collaboration->title }}
							</p>
							<span class="list-item-date">
								<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}
							</span>
							&nbsp;
							<span class="list-item-date">
								<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}
							</span>
						</li>
					</a>
				@endforeach
			@else
				<p class="text-muted">
					<i class="fa fa-frown-o" aria-hidden="true"></i>&nbsp;No col·labores amb cap llista.
				</p>
			@endif

		</ul>
	</div>

</div>

@endsection

@section('content')

<div class="background-icon">
	<div class="icon">

	</div>
</div>

@endsection

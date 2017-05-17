@extends('layouts.master')

@section('page_title', 'Productes')

@section('sidebar')

	<div class="list-group-item">
		<?php
			$time = date('h:i', strtotime($list->event_date));
			$date = date('d-m-y', strtotime($list->event_date));
		?>
		<h4><i class="fa fa-info fa-3x" aria-hidden="true"></i></h4>

		<div class="btn-lists">
			<span>
				<a href="" type="button" data-toggle="modal" data-target="#modal-delete-list" data-list-id="{{ $list->id }}">
					<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
				</a>
			</span>
			&nbsp;
			<span>
				<a href="">
					<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
				</a>
			</span>
		</div>
		<h4 class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}</h4>
		<h4 class="list-group-item"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}</h4>
		<h4 class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $list->location }}</h4>
		<h4 class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Participants:</h4>
		<ul class="list-group-item fa-ul">
			<li>
				<span class="fa-li fa-stack fa-lg">
					<i class="fa fa-user fa-stack-1x" aria-hidden="true"></i>
					<i class="fa fa-user-o fa-stack-1x" aria-hidden="true"></i>
				</span>
				&nbsp; {{ $list->owner }}
			</li>
			@foreach($colaboradors as $colaborador)
				<li>
					<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; {{ $colaborador->name }}
				</li>
			@endforeach
		</ul>
	</div>

@endsection

@section('content')

	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; {{ $list->title }}
	</h2>

	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseCreateProduct" aria-expanded="false" aria-controls="collapseCreateProduct">
		Nou producte
	</button>

	@include('products.create')

	<div class="table-responsive">
		<table class="table table-striped">
			<tbody>
				@foreach($products as $key => $product)
					<tr data-product-id="{{ $product->id }}">
						<td>
							@if ($product->confirmed == 0)
								<i class="fa fa-square-o" aria-hidden="true"></i>
							@else
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							@endif
						</td>

						<td>
							<span class="toggle-info">{{ $product->name }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->name }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->quantity }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->quantity }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->units }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->units }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->price }}</span>
							<input class="form-control toggle-input" type="text" value="{{ $product->price }}"/>
						</td>

						<td>
							<span class="toggle-info">{{ $product->assigned_to }}</span>
							<select class="toggle-input" name="colaboradors">
									<option value="null"></option>
									<option value="{{ $list->owner }}">Propietari</option>
								@foreach($colaboradors as $colaborador)
									<option value="{{ $colaborador->id }}">{{ $colaborador->name }}</option>
								@endforeach
							</select>
						</td>

						<td>
							<div class="btn-product">
								<span class="btn-product-edit">
									<a href="">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
								</span>
								<span class="btn-product-delete">
									<a href="" data-toggle="modal" data-target="#modal-product-delete">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</a>
								</span>
							</div>
						</td>

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	@include('layouts.modal_delete')

	@include('products.modal_delete')

@endsection

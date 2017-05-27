@extends('layouts.master')

@section('page_title', 'Productes')

@section('sidebar')

	@include('lists.modal_delete')

	@include('products.modal_delete')

<div class="sidebar-wrapper">

	<div class="btn-lists">
		<span>
			<a class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseAddUser" aria-expanded="false" aria-controls="collapseAddUser">
				<i class="fa fa-user-plus fa-2x fa-fw" aria-hidden="true"></i>
			</a>
		</span>
		&nbsp;
		<span>
			<a href="/colaborations/{{ $list->id }}" type="button" class="btn btn-danger">
				<i class="fa fa-user-times fa-2x fa-fw" aria-hidden="true"></i>
			</a>
		</span>
		&nbsp;
		<span>
			<a href="/lists/{{ $list->id }}/edit" type="button" class="btn btn-warning">
				<i class="fa fa-pencil fa-2x fa-fw" aria-hidden="true"></i>
			</a>
		</span>
		&nbsp;
		<span>
			<a href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-list-delete" data-list-id="{{ $list->id }}">
				<i class="fa fa-trash-o fa-2x fa-fw" aria-hidden="true"></i>
			</a>
		</span>
		&nbsp;
		<span>
			<a href="/products/create/{{ $list->id }}" type="button" class="btn btn-primary">
				<i class="fa fa-lemon-o fa-2x fa-fw" aria-hidden="true"></i>
			</a>
		</span>
		@include ('lists.add_user')
	</div>

	<div class="lists-wrapper">
		<ul class="lists-ul">
			<div class="list-group-item">
				<?php
					$time = date('H:i', strtotime($list->event_date));
					$date = date('d-m-Y', strtotime($list->event_date));
				?>
				<h4><i class="fa fa-info-circle fa-3x" aria-hidden="true"></i></h4>

				<h4 class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}</h4>
				<h4 class="list-group-item"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}</h4>
				<h4 class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $list->location }}</h4>
				<h4 class="list-group-item"><i class="fa fa-info" aria-hidden="true"></i>&nbsp; {{ $list->description }}</h4>
				<h4 class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Participants:</h4>
				<ul class="list-group-item fa-ul">
					<li>
						<i class="fa fa-user" aria-hidden="true"></i>
						&nbsp; {{ $owner->name.' '.$owner->last_name }}
					</li>
					@foreach($colaboradors as $colaborador)
						<li>
							<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; {{ $colaborador->name.' '.$colaborador->last_name }}
						</li>
					@endforeach
				</ul>
			</div>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="col-md-7">

	<h2 class="sub-header">
		<span class="fa-stack fa-lg">
			@if ( Auth::user()->id == $list->owner )
				<i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true"></i>
			@else
				<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
			@endif
			<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
		</span>
		&nbsp; {{ $list->title }}
	</h2>

	<div class="table-responsive">
		<table class="table table-striped">
			<tbody>

				@foreach($products as $product)
					<tr data-product-id="{{ $product->id }}">
						<td>
							<div class="row">
								<div class="p-name col-md-12">
									<h3>{{ $product->name }}</h3>
								</div>
								<div class="p-total col-md-6 text-left">
									<p>{{ $product->quantity.' '.$product->units.' x '.$product->price.'€ = '.($product->quantity*$product->price).'€' }}</p>
								</div>
								<div class="p-assigned col-md-6">
									<p><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;
										@if ($product->assigned_to)
											@if ($product->assigned_to == $owner->owner)
												{{ $owner->name.' '.$owner->last_name }}
											@else
												@foreach ($colaboradors as $colab)
													@if ($product->assigned_to == $colab->id)
														{{ $colab->name.' '.$colab->last_name }}
													@endif
												@endforeach
											@endif
										@endif
									</p>
								</div>
							</div>
						</td>

						<td>
							<div class="btn-product">
								<span class="btn-product-edit">
									<a href="/products/{{ $product->id }}/edit" type="button" class="">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
								</span>
								<span class="btn-product-delete">
									<a href="" type="button" class="" data-toggle="modal" data-target="#modal-product-delete">
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
</div>

<div class="col-md-5 list-charts">
	<div class="side-bar">

	</div>
</div>

@endsection

@extends('layouts.master')

@section('page_title', 'Productes')

@section('sidebar')

	@include('lists.modal_delete')

	@include('products.modal_delete')

<div class="sidebar-wrapper">

	<div class="btn-lists">
		@if ( Auth::user()->id == $list->owner )
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
		@endif
			<span>
				<a href="/products/create/{{ $list->id }}" type="button" class="btn btn-success">
					<i class="fa fa-lemon-o fa-2x fa-fw" aria-hidden="true"></i>
				</a>
			</span>
			@include ('lists.add_user')
	</div>

	<div class="lists-wrapper">
		<ul class="lists-ul">

			<li class="lists-own-title">
				<p>
					<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>&nbsp; Informació:
				</p>
			</li>

			<div class="list-group-item">
				<?php
					$time = date('H:i', strtotime($list->event_date));
					$date = date('d-m-Y', strtotime($list->event_date));
				?>
				<li class="list-info-item">
					<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}
				</li>
				<li class="list-info-item">
					<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $time }}
				</li>
				<li class="list-info-item">
					<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ $list->location }}
				</li>
				<li class="list-info-item">
					<i class="fa fa-info" aria-hidden="true"></i>&nbsp; <u>Descripció:</u></br>
					<p class="text-justify" style="margin: 5px 0; font-size: 15px;">{{ $list->description }}</p>
				</li>
				<li class="list-info-item">
					<i class="fa fa-users" aria-hidden="true"></i>&nbsp; <u>Col·laboradors:</u>
					<ul class="list-info-item fa-ul" style="margin: 5px 0 5px 20px;">
						<li style="font-size: 15px;">
							<i class="fa fa-user" aria-hidden="true"></i>
							&nbsp; {{ $owner->name.' '.$owner->last_name }}
						</li>
						@foreach($colaboradors as $colaborador)
							<li style="font-size: 15px;">
								<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; {{ $colaborador->name.' '.$colaborador->last_name }}
							</li>
						@endforeach
					</ul>
				</li>
			</div>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="col-md-7">

	<div class="sub-header">
		<div class="list-title-icon">
			<span class="fa-stack fa-lg">
				@if ( Auth::user()->id == $list->owner )
					<i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true"></i>
				@else
					<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
				@endif
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
		</div>
		<div class="list-title-text">
			<div class="list-title">{{ $list->title }}</div>
		</div>
	</div>

	<div class="products-list-wrapper">

			<div class="list-info-item">
				<div><i class="fa fa-lemon-o fa-fw" aria-hidden="true"></i>&nbsp; Productes:</div>
			</div>

			<div class="products-list-container">
				@foreach($products as $product)
						<div class="p-body" data-product-id="{{ $product->id }}">
							<div class="p-header">
								<div class="p-name">
									<div class="g-shadow">{{ $product->name }}</div>
								</div>

								<div class="btn-product">
									@if ( Auth::user()->id == $list->owner )
										<span class="btn-product-edit">
											<a class="btn btn-warning" href="/products/{{ $product->id }}/edit" type="button">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
										</span>
										<span class="btn-product-delete">
											<a class="btn btn-danger" href="" type="button" class="" data-toggle="modal" data-target="#modal-product-delete">
												<i class="fa fa-trash-o" aria-hidden="true"></i>
											</a>
										</span>
									@elseif ( $product->editable )
									<span class="btn-product-edit">
										<a class="btn btn-warning" href="/products/{{ $product->id }}/edit" type="button">
											<i class="fa fa-pencil" aria-hidden="true"></i>
										</a>
									</span>
									@endif
								</div>
							</div>

							<div class="p-info">
								<div class="p-total text-left">
									{{ $product->quantity.' '.$product->units.' x '.$product->price.'€ = '}} <strong class="g-shadow">{{ number_format(($product->quantity*$product->price), 2).'€' }}</strong>
								</div>
							</div>

							<div class="p-footer">
								<div class="p-assigned text-left">
									<i class="fa fa-user-o" aria-hidden="true"></i>
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
								</div>

								<div class="p-updated text-right">
									<div class="text-right">
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ $product->updated_at }}</div>
								</div>
							</div>
						</div>
				@endforeach
			</div>
	</div>
</div>

<div class="col-md-5 list-graphs">
	<div class="side-bar">

	</div>
</div>

@endsection

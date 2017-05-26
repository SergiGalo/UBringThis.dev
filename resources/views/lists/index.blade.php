@extends('layouts.master')

@section('page_title', 'Llistes')

@section('sidebar')

	<div class="">
		<div class="btn-lists">
			<span>
				<a href="{{ url('/lists/create') }}">
					<i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i>
				</a>
			</span>
		</div>

	<ul class="">

		<li>
			<h4>
				<i class="fa fa-user" aria-hidden="true"></i>&nbsp; LLISTES:
			</h4>
		</li>

		@foreach($lists as $list)
		<?php $date = date('d-m-y', strtotime($list->event_date)); ?>
			<a class="list-group-item" href="/lists/{{ $list->id }}">
				<li class="list-item">
					<h4 class="">
						<span class="fa-stack fa-lg">
							<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
							<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
						</span>&nbsp; {{ $list->title }}
					</h4>
					<!-- <span><a href="" type="button" data-toggle="modal" data-target="#modal-delete-list" data-list-id="{{ $list->id }}">
						<i class="fa fa-trash-o" aria-hidden="true"></i></a>
					</span> -->
					<h5 class="lists-date"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}</h5>
				</li>
			</a>
		@endforeach

		<li>
			<h4><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp; COL·LABORACIONS:</h4>
		</li>

		@foreach($collaborations as $collaboration)
		<?php $date = date('d-m-y', strtotime($list->event_date)); ?>
			<a class="list-group-item" href="/lists/{{ $collaboration->id }}">
				<li class="list-item">
					<h4 class="">
						<span class="fa-stack fa-lg">
							<i class="fa fa-shopping-basket fa-stack-1x" aria-hidden="true"></i>
							<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
						</span>&nbsp; {{ $collaboration->title }}
					</h4>
					<h5 class="lists-date"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; {{ $date }}</h5>
				</li>
			</a>
		@endforeach

	</ul>
	</div>

@endsection

@section('content')

<div class="background-icon">
	<div class="icon">

	</div>
</div>

@endsection

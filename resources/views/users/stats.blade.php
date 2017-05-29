@extends('layouts.master')

@section('page_title', 'Estadístiques')


@section('sidebar')
@endsection


@section('content')

<div class="col-md-6">
	<div class="panel panel-default" style="margin-top: 30px">
		<div class="panel-heading">
			<span class="fa-stack fa-lg">
				<i class="fa fa-area-chart fa-stack-1x" aria-hidden="true"></i>
				<i class="fa fa-square-o fa-stack-2x" aria-hidden="true"></i>
			</span>
			&nbsp; Estadístiques de l'usuari</div>
		<div class="panel-body">
			<div class="stats-item">
				<div class="text-left">
					Total llistes:
				</div>
				<div class="text-right">
					{{ $stats['total_lists']}}
				</div>
			</div>

			<div class="stats-item">
				<div class="text-left">
					Llistes actives:
				</div>
				<div class="text-right">
					{{ $stats['total_lists_active']}}
				</div>
			</div>

			<div class="stats-item">
				<div class="text-left">
					Llistes eliminades:
				</div>
				<div class="text-right">
					{{ $stats['total_lists_deleted']}}
				</div>
			</div>

			<div class="stats-item">
				<div class="text-left">
					Total col·laboracions
				</div>
				<div class="text-right">
					{{ $stats['total_colab']}}
				</div>
			</div>

		</div>
	</div>
</div>

@endsection

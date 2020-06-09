@extends('frontend.layout.master')
@section('postheader')
<div id="post-header" class="page-header">
	<div class="page-header-bg" style="background-image: url('{{ $post->image }}'); background-position: 0px -71px; background-size:auto; background-repeat:no-repeat;" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-category">
					<a href="category.html">{{$post->category->name}}</a>
				</div>
				<h1>{{$post->title}}</h1>
				<ul class="post-meta">
					<li><a href="author.html">{{ $post->user->name}}</a></li>
					<li>{{$post->created_at}}</li>
					<li><i class="fa fa-comments"></i> 3</li>
					<li><i class="fa fa-eye"></i> 807</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
{!! $post->content !!}

@endsection
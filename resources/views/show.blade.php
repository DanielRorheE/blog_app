@extends('layouts.blog')

@section('title', $post->title . ' — Enriquez Journal')

@section('content')
	<article class="story-page">
		<a class="back-link" href="{{ route('posts.index') }}"><span aria-hidden="true">←</span> All stories</a>

		<header class="story-heading">
			<p class="eyebrow"><span class="eyebrow-mark" aria-hidden="true"></span> FIELD NOTES</p>
			<h1>{{ $post->title }}</h1>
			<div class="story-meta">
				<span class="story-meta-mark" aria-hidden="true"></span>
				<time datetime="{{ $post->created_at?->toDateString() }}">Published {{ $post->created_at?->format('F d, Y') }}</time>
			</div>
		</header>

		<div class="story-body">{{ $post->body }}</div>

		<div class="story-actions">
			<a class="text-link" href="{{ route('posts.index') }}"><span aria-hidden="true">←</span> Back to the archive</a>
			<div class="story-actions-group">
				<a class="button button-secondary" href="{{ route('posts.edit', $post) }}">Edit story</a>
				<form class="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
					@csrf
					@method('DELETE')
					<button class="delete-button" type="submit">Delete</button>
				</form>
			</div>
		</div>
	</article>
@endsection
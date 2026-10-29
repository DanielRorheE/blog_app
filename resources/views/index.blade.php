@extends('layouts.blog')

@section('title', 'Stories — Enriquez Journal')

@section('content')
    <section class="collection-hero">
        <div>
            <p class="eyebrow"><span class="eyebrow-mark" aria-hidden="true"></span> A PERSONAL BLOG / EST. 2026</p>
            <h1>Ideas, stories,<br><em>and everything between.</em></h1>
            <p class="hero-description">A home for the thoughts, moments, and small discoveries worth keeping.</p>
        </div>
        <a class="button" href="{{ route('posts.create') }}">Write a post <span aria-hidden="true">+</span></a>
    </section>

    @if (session('success'))
        <p class="notice" role="status">{{ session('success') }}</p>
    @endif

    <section aria-labelledby="latest-heading">
        <div class="collection-toolbar">
            <div>
                <span class="section-kicker">THE ARCHIVE</span>
                <h2 id="latest-heading">Latest entries</h2>
            </div>
            <span class="post-count">{{ str_pad((string) $posts->count(), 2, '0', STR_PAD_LEFT) }} {{ $posts->count() === 1 ? 'story' : 'stories' }}</span>
        </div>

        @forelse ($posts as $index => $post)
            <article class="post-row">
                <span class="post-number">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                <div>
                    <div class="post-meta">
                        <span>FIELD NOTES</span>
                        <time datetime="{{ $post->created_at?->toDateString() }}">{{ $post->created_at?->format('M d, Y') }}</time>
                    </div>
                    <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                    <p class="post-excerpt">{{ \Illuminate\Support\Str::limit($post->body, 190) }}</p>
                    <div class="post-actions">
                        <a class="text-link" href="{{ route('posts.show', $post) }}">Read story <span aria-hidden="true">→</span></a>
                        <a class="text-link" href="{{ route('posts.edit', $post) }}">Edit</a>
                        <form class="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="empty-state">
                <h3>Your first story starts here.</h3>
                <p>Create a post and it will appear in your journal.</p>
                <a class="button" href="{{ route('posts.create') }}">Create your first post <span aria-hidden="true">+</span></a>
            </div>
        @endforelse
    </section>
@endsection
@extends('layouts.blog')

@section('title', 'Edit story — Enriquez Journal')

@section('content')
    <section class="form-page">
        <a class="back-link" href="{{ route('posts.show', $post) }}"><span aria-hidden="true">←</span> Back to story</a>

        <header class="form-heading">
            <span class="form-step">EDITING / {{ str_pad((string) $post->id, 2, '0', STR_PAD_LEFT) }}</span>
            <h1>Make it just right.</h1>
            <p>Revisit your words and make the changes you need.</p>
        </header>

        <form class="post-form" action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="title">Story title <span class="field-hint">A clear, memorable headline</span></label>
                <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" maxlength="255" required autofocus>
                @error('title') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="body">Your story <span class="field-hint">Write freely. Line breaks are preserved.</span></label>
                <textarea id="body" name="body" required>{{ old('body', $post->body) }}</textarea>
                @error('body') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-actions">
                <a class="text-link" href="{{ route('posts.show', $post) }}">Cancel</a>
                <button class="button" type="submit">Save changes <span aria-hidden="true">→</span></button>
            </div>
        </form>
    </section>
@endsection
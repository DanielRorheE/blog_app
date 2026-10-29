@extends('layouts.blog')

@section('title', 'Write a story — Enriquez Journal')

@section('content')
    <section class="form-page">
        <a class="back-link" href="{{ route('posts.index') }}"><span aria-hidden="true">←</span> Back to stories</a>

        <header class="form-heading">
            <span class="form-step">NEW ENTRY / 01</span>
            <h1>Put it into words.</h1>
            <p>Every good story begins with a title. Take your time.</p>
        </header>

        <form class="post-form" action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="title">Story title <span class="field-hint">A clear, memorable headline</span></label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Give your story a title" maxlength="255" required autofocus>
                @error('title') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="body">Your story <span class="field-hint">Write freely. Line breaks are preserved.</span></label>
                <textarea id="body" name="body" placeholder="Start writing here..." required>{{ old('body') }}</textarea>
                @error('body') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-actions">
                <a class="text-link" href="{{ route('posts.index') }}">Cancel</a>
                <button class="button" type="submit">Publish story <span aria-hidden="true">→</span></button>
            </div>
        </form>
    </section>
@endsection
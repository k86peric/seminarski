@extends('layouts.app')

@section('content')

  <dialog open>
    <article class="wide">
      <header>
        <br>
        <a href="{{ url()->previous() }}" aria-label="Close" class="close"></a>
        <b>Create new page</b>
      </header>
      <form method="POST" action="/navigation">
        @csrf
        <label for="name">Nav Title</label>
        <input type="text" name="name">
        <label for="slug">Page</label>
        <select name="page_id" id="">
          <option>Select Page</option>

          @foreach($data as $page)

          <option value="{{ $page->page->id }}">
            ID:{{ $page->page->id }} - {{ $page->page->name }} ( /{{$page->page->slug}} )
          </option>
          @endforeach
        </select>

        <input type="submit" value="Save">
      </form>
    </article>
  </dialog>

@endsection
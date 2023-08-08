@extends('layouts.app')

@section('content')

  <dialog open>
    <article class="wide">
      <header>
        <br>
        <a href="{{ url()->previous() }}" aria-label="Close" class="close"></a>
        <b>Edit Nav - <i>{{$item->name}}</i></b>
      </header>
      <form method="POST" action="/navigation">
        @csrf
        @method('PATCH')
        <label for="name">Nav Title</label>
        <input type="text" name="name" value={{$item->name}} >
        <label for="slug">Page</label>
        <select name="page_id" id="">

          @foreach($data as $page)

          <option value="{{ $page->id }}" {{ $page->id == $item->id ? 'selected' : '' }}>
            ID:{{ $page->id }} - {{ $page->name }} ( /{{$page->slug}} )
          </option>
          @endforeach
        </select>

        <input type="submit" value="Save">
      </form>
    </article>
  </dialog>
@endsection
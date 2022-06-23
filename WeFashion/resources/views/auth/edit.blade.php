@extends('layouts.master')

@section('content')
    <form action="{{ route('books.update', $book->id) }}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        Titre : <input class="form-control" type="text" name="title" value="{{old('title', $book->title)}}">
        @error('title')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        Genre : <select class="form-control" name="genre_id">
            <option value="null">Choisir un genre</option>
            @foreach ($genresBook as $genre)
            <option value="{{$genre->id}}" {{($genre->id == old('genre_id',$book->genre_id))?'selected':''}}>{{$genre->name}}</option>
            @endforeach
        </select><br>
        Description : <textarea class="form-control" name="description">{{ old('description', $book->description) }}</textarea>
        @error('description')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        Date de publication : <input class="form-control" type=date name="published_at" value="{{ old('published_at',date('Y-m-d', strtotime($book->published_at))) }}">
        @error('published_at')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        Status :<br>
        <label><input type="radio" name="status" value="Published" {{(old('status', $book->status)=="Published")?'checked':''}}> Publier</label><br>
        <label><input type="radio" name="status" value="Unpublished" {{(old('status', $book->status)=="Unpublished")?'checked':''}}> Dépublier</label>
        @error('status')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        Title de l'image : <input class="form-control" type="text" name="title_image" value="{{old('title_image', $book->picture->title)}}"><br>
        Remplacer l'image : <input class="form-control" type="file" name="picture">
        @error('picture')
        <span style="color:red">{{$message}}</span>
        @enderror
        {{-- @dump(public_path('images/'.$book->picture->link)) --}}
        @if (file_exists(public_path('images/'.$book->picture->link)))
        <img src="{{asset('images/'.$book->picture->link)}}" width="200">

        @endif
        <br>
        Auteur(s) :<br>
        {{-- @dump($book->authors->first()->id) --}}
        @foreach ($authors as $author)
        <label><input type="checkbox" name="authors[]" value="{{$author->id}}" {{in_array($author->id, old('authors', $checkedAuthors))? 'checked':'' }} > {{$author->firstname}} {{$author->name}}</label><br>
        @endforeach
        @error('authors')
        <span style="color:red">{{$message}}</span>
        @enderror
        <button class="form-control" type='submit'>Modifier</button>
    </form>
@endsection

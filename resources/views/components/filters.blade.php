@props(['populateData','genres', 'people'])

<div class="container mt-3">
    <div class="row" style="margin-left: 8rem">
    <form action="{{ route('film.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-2">
                <select class="form-select @error('rating') is-invalid @enderror" name="rating">
                    <option value="">Rating</option>
                    <option value="10" @if(old('rating', $populateData['rating'] ?? '') == 10) selected @endif>10</option>
                    @for ($i = 9; $i >= 1; $i--)
                        <option value="{{ $i }}" @if(old('rating', $populateData['rating'] ?? '') == $i) selected @endif>{{ $i }}+</option>
                    @endfor
                </select>
                @error('rating')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <div class="input-group @error('year_from') is-invalid @enderror @error('year_to') is-invalid @enderror">
                    <input type="text" class="form-control" placeholder="Year from" name="year_from" value="{{ old('year_from', $populateData['year_from'] ?? '') }}">
                    <input type="text" class="form-control" placeholder="Year to" name="year_to" value="{{ old('year_to', $populateData['year_to'] ?? '') }}">
                </div>
                @error('year_from')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('year_to')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2">
                <select class="form-select" name="genre">
                    <option value="">Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @if(($populateData['genre'] ?? '') == $genre->id) selected @endif>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <select class="form-select" name="star">
                    <option value="">Star</option>
                    @foreach ($people as $p)
                        <option value="{{ $p->id }}" @if(($populateData['star'] ?? '') == $p->id) selected @endif>{{ $p->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <div class="d-flex">
                    <button class="btn btn-primary me-md-2" type="submit">{{ __('Filter') }}</button>
                    <div>
                    <a class="btn btn-secondary" href="{{ route('film.index') }}">
                        {{ __('Cancel') }}
                    </a>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

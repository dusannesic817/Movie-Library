<a class="btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
    aria-controls="collapseExample">
    <div class="d-flex justify-content-between">
        <div class="card-header">{{ __('Filter') . ': ' . __('Film') }}
        </div>
        <div>
            <i class="bi bi-three-dots"></i>
        </div>
    </div>
</a>

<div class="collapse" id="collapseExample">
    <div class=" mt-3">
        <form class="d-flex" action="{{ route('film.index') }}">
            <div class="row">

                <div class="col-12 mb-3">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search">
                </div>
            </div>
            <div class="col-2 mb-2" style="margin-left:30px;">
                <select class="form-select @error('rating') is-invalid @enderror" name="rating">
                    <option value="">Rating</option>
                    <option value="10" @selected(old('rating', $populateData['rating'] ?? '') == 10)>10</option>
                    @for ($i = 9; $i >= 1; $i--)
                        <option value="{{ $i }}" @selected(old('rating', $populateData['rating'] ?? '') == $i)>{{ $i }}+</option>
                    @endfor
                </select>
                @error('rating')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2 mb-2" style="margin-left:30px;">

                <div
                    class="input-group @error('year_from') is-invalid @enderror @error('year_to') is-invalid @enderror">
                    <input type="text" class="form-control" placeholder="Year from" name="year_from"
                        value="{{ old('year_from', $populateData['year_from'] ?? '') }}">
                    <input type="text" class="form-control" placeholder="Year to" name="year_to"
                        value="{{ old('year_to', $populateData['year_to'] ?? '') }}">
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
            <div class="col-2 mb-2" style="margin-left:30px;">
                <select class="form-select" name="genre">
                    <option value="">Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(($populateData['genre'] ?? '') == $genre->id)>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2 mb-2" style="margin-left:30px;">

                <select class="form-select" name="star">
                    <option value="">Star</option>
                    @foreach ($people as $p)
                        <option value="{{ $p->id }}" @selected(($populateData['star'] ?? '') == $p->id)>{{ $p->full_name }}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div class="row mb-3" style="margin-right: 30px; ">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="submit">{{ __('Search') }}</button>
            <a class="btn btn-secondary" href="{{ route('film.index') }}">
                {{ __('Cancel') }}
            </a>
        </div>
    </div>

    </form>
</div>
</div>

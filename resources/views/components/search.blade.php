@props(['route'])

@auth
    <nav class="navbar bg-body-tertiary">
        <form class="container-fluid" role="search" action="{{route($route)}}">
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="basic-addon1" style="width:500px;">
                <button class="input-group-text btn btn-primary" type="submit" id="basic-addon1"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </nav>
@endauth
{{-- including js and css libraries --}}
@include('common.header')

{{-- black helper navbar  --}}
@include('common.blackNav')

{{-- NavBar --}}
<div class="container" id="searchNav">
    <div class="row navbar navbar-dark">
        <div class="col-sm-3">
            <a class="navbar-brand" href="{{ URL::route('home') }}">
                <img src="{{url('images/logoIcon.png')}}" alt="Health-E">
                <img src="{{url('images/logoType.png')}}" alt="Health-E">
            </a>
        </div>

        <div class="col-sm-5">
            <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between">
            {{ csrf_field() }}
                <input type="text" placeholder="Пребарај..." name="q" class="form-control mr-sm-2" id="searchInput">
                <button type="submit" class="btn btn-danger my-2 my-sm-0 orangeBg" id="searchButton">Најди</button>
            </form>
        </div>

        <div class="col-sm-4 pl-sm-3" id="navbarButtons">
            <button type="button" class="btn btn-danger orangeBg" onclick="myLocation()">Освежи локација</button>
            <button type="button" class="btn btn-secondary" onclick="myLocation()">Додади твоја локација</button>
        </div>
    </div>
</div>

{{-- search results --}}
<div class="container" id="tableMap">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Име</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Работно Време</th>
                        <th scope="col">Адреса</th>
                        <th scope="col">Веб Страна</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table-light">
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->working_hours }}</td>
                            <td>{{ $user->address }}</td>
                            @if ($user->website == "N/A")
                                <td> N/A </td>
                            @else
                                <td><a href="{{ $user->website }}">Линк до страната!</a></td>
                            @endif
                        </tr>
                        <?php 
                            echo "<script type='text/javascript'>
                                $(document).ready(function() {
                                    addMarker('$user->long', '$user->lat');
                                });
                                </script>"
                        ?>
                    @endforeach

                </tbody>
            </table>
            <span>
                {{ $users->links('pagination::bootstrap-4') }}
            </span>
        </div>
        <div class="col-sm-6">
            <div id='map' style='width: 100%; height: 30rem;'></div>
        </div>
    </div>
</div>

{{-- mapbox and bootstrap js inclusion --}}
@include('common.footer')
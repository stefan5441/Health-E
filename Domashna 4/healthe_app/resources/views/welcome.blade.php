{{-- including js and css libraries --}}
@include('common.header')

{{-- black helper navbar  --}}
@include('common.blackNav')

{{-- page content  --}}
<div class="container center" id="welcomePage">
        <img src="{{url('images/logoTypeIcon.png')}}" alt="Health-E" id="imageLogo">

    <form action="{{ route("search") }}" method="GET" role="search" class="d-flex flex-row justify-content-between center">
        {{ csrf_field() }}
        <input type="text" placeholder="Пребарај..." name="q" class="form-control mr-sm-2" id="searchInput">
        <button type="submit" class="btn btn-danger my-2 my-sm-0 orangeBg" id="searchButton">Најди</button>
    </form>
</div>
{{-- page content end --}}

{{-- mapbox and bootstrap js inclusion --}}
@include('common.footer')

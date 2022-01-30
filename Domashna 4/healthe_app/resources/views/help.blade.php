{{-- including js and css libraries --}}
@include('common.header')

{{-- black helper navbar  --}}
@include('common.blackNav')

{{-- page content  --}}
<div class="container center" id="welcomePage">
    <img src="{{url('images/logoTypeIcon.png')}}" alt="Health-E" id="imageLogo">
    <ul>
        <li>Contanct info:</li>
        <li>Phone: xxx/xxx-xxx</li>
        <li>Mail: xxx@gmail.com</li>
    </ul>
</div>
{{-- page content end --}}

{{-- mapbox and bootstrap js inclusion --}}
@include('common.footer')

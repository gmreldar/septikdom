<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="product_id">Продукт:</label>
    <select class="form-control" name="product_id" id="product_id">
        @foreach($products as $product)
            <option
                    @if(isset($marker))
                    @if($product->id == $marker->product_id)
                    selected
                    @endif
                    @endif
                    value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
    </select>
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) !!}

    {!! Form::label('comment', 'Комментарий:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}

    {!! Form::label('lat', 'LAT:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}

    {!! Form::label('lng', 'LNG:') !!}
    {!! Form::text('lng', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-6">
    <div id="map" style="width: 100%; height: 600px"></div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('admin.map') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="{{ asset('/js/selectImage.js') }}"></script>
    <script>
        {{--function myMap() {--}}
        {{--var mapOptions = {--}}
        {{--@if(isset($marker))--}}
        {{--center: new google.maps.LatLng({{$marker->lat}}, {{$marker->lng}}),--}}
        {{--@else--}}
        {{--center: new google.maps.LatLng(62.0940418420403, 94.31975564893442),--}}
        {{--@endif--}}
        {{--zoom: 3.5,--}}
        {{--mapTypeId: google.maps.MapTypeId.roadmap--}}
        {{--}--}}
        {{--var map = new google.maps.Map(document.getElementById("map"), mapOptions);--}}
        {{--var click;--}}
        {{--var mapZoom;--}}
        {{--var lastMarker;--}}

        {{--@if(isset($marker))--}}
        {{--lastMarker = new google.maps.Marker({--}}
        {{--position: {lat: {{$marker->lat}}, lng: {{$marker->lng}}},--}}
        {{--map,--}}
        {{--title: '',--}}
        {{--label: '',--}}
        {{--optimized: false,--}}
        {{--icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'--}}
        {{--});--}}

        {{--@endif--}}

        {{--function placeMarker() {--}}
        {{--if (mapZoom == map.getZoom()) {--}}
        {{--if (lastMarker)--}}
        {{--lastMarker.setMap(null);--}}
        {{--lastMarker = new google.maps.Marker({--}}
        {{--position: {lat: click.lat(), lng: click.lng()},--}}
        {{--map,--}}
        {{--title: '',--}}
        {{--label: '',--}}
        {{--optimized: false,--}}
        {{--icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'--}}
        {{--});--}}

        {{--document.getElementById('lat').value = '' + click.lat();--}}
        {{--document.getElementById('lng').value = '' + click.lng();--}}
        {{--}--}}
        {{--}--}}

        {{--google.maps.event.addListener(map, 'click', function (event) {--}}
        {{--mapZoom = map.getZoom();--}}
        {{--click = event.latLng;--}}
        {{--setTimeout(placeMarker, 300);--}}
        {{--});--}}
        {{--}--}}

        {{--document.addEventListener('DOMContentLoaded', function () {--}}
        {{--myMap();--}}
        {{--});--}}

        document.addEventListener('DOMContentLoaded', function () {
                    @if(isset($marker))
            var mymap = L.map('map').setView([{{$marker->lat}}, {{$marker->lng}}], 6);
                    @else
            var mymap = L.map('map').setView([62.0940418420403, 94.31975564893442], 3);
            @endif


            L.tileLayer('https://api.mapbox.com/styles/v1/civol43275/ckor459sy5bxi17lel99hihmc/tiles/512/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiY2l2b2w0MzI3NSIsImEiOiJja29veHVrdzUwN3B1Mm5zdG41cnI3OGRhIn0.LWoq4a6bjqRpoC86wDKFAQ', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiY2l2b2w0MzI3NSIsImEiOiJja29veHVrdzUwN3B1Mm5zdG41cnI3OGRhIn0.LWoq4a6bjqRpoC86wDKFAQ'
            }).addTo(mymap);

            var Icon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            var marker = null;

                @if(isset($marker))
            {
                marker = L.marker([{{$marker->lat}}, {{$marker->lng}}], {icon: Icon});
                mymap.addLayer(marker);
            }
            @endif

            mymap.on('click', (e) => {
                if (marker != null)
                    mymap.removeLayer(marker);
                document.getElementById('lat').value = '' + e.latlng.lat;
                document.getElementById('lng').value = '' + e.latlng.lng;
                marker = L.marker([e.latlng.lat, e.latlng.lng], {icon: Icon});
                //marker.addTo(mymap);
                mymap.addLayer(marker);
            });

            // var markers = [];


            // septicMarkers.forEach(([position, product_title, product_link, price, comment], i) => {
            //     var marker = L.marker([position['lat'], position['lng']], {icon: Icon});
            //
            //     marker.bindPopup($('#markerWindow').html().replace('|PRODUCT_TITLE|', product_title).replace('|PRODUCT_LINK|', product_link).replace('|PRICE|', price).replace('|COMMENT|', comment)).openPopup();
            //
            //     marker.addTo(mymap);
            //     markers.push(marker);
            // });

        })
        ;
    </script>
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdvhRlW-gTK_gP4kkFb4HQALJhwAO9FCQ&callback=myMap"></script>--}}
@endsection
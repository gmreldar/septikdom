@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Карта</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('admin.map.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div id="map" style="width:100%;height:400px; margin-bottom: 25px;">MAP</div>
        <div id="markerWindow" style="display: none">
            <div class="">
                <span style="font-weight: bold">Продукт: <a style="font-weight: normal" href="|PRODUCT_LINK|">|PRODUCT_TITLE|</a></span><br>
                <span style="font-weight: bold">Цена: <span style="font-weight: normal" >|PRICE|</span></span><br>
                <span style="font-weight: bold">Комментарий: <span style="font-weight: normal" >|COMMENT|</span></span>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-responsive" id="reviews-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>Продукт</th>
                        <th>Цена</th>
                        <th>Комментарий</th>
                        <th>Действие</th>
                        {{--<th colspan="3">Действие</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($markersMap as $marker)
                        <tr data-id="{{ $marker['id'] }}">
                            <td>{{$marker['id']}}</td>
                            <td>{{$marker['lat']}}</td>
                            <td>{{$marker['lng']}}</td>
                            <td><a href="{{$marker['product_link']}}">{{$marker['product_title']}}</a></td>
                            <td>{{$marker['price']}}</td>
                            <td>{{$marker['comment']}}</td>
                            <td>
                                {!! Form::open(['route' => ['admin.map.destroy', $marker['id']], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('admin.map.edit', [$marker['id']]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                    <script>
                        function myMap() {
                            var mapOptions = {
                                center: new google.maps.LatLng(62.0940418420403, 94.31975564893442),
                                zoom: 3.5,
                                mapTypeId: google.maps.MapTypeId.roadmap
                            }
                            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                            const tourStops = [
                                    @foreach($markersMap as $marker)
                                ['{{$marker['id']}}', {lat: {{$marker['lat']}}, lng: {{$marker['lng']}}}, '{{$marker['product_title']}}', '{{$marker['product_link']}}', '{{$marker['price']}}', '{{$marker['comment']}}'],
                                @endforeach
                            ];

                            // Create an info window to share between markers.
                            const infoWindow = new google.maps.InfoWindow();
                            // Create the markers.
                            tourStops.forEach(([id, position, product_title, product_link, price, comment], i) => {
                                const marker = new google.maps.Marker({
                                    position,
                                    map,
                                    title: id,
                                    label: id,
                                    optimized: false,
                                });
                                // Add a click listener for each marker, and set up the info window.
                                marker.addListener("click", () => {
                                    infoWindow.close();
                                    infoWindow.setContent(document.getElementById('markerWindow').innerHTML.replace('|PRODUCT_TITLE|', product_title).replace('|PRODUCT_LINK|', product_link).replace('|PRICE|', price).replace('|COMMENT|', comment));
                                    infoWindow.open(marker.getMap(), marker);
                                });
                            });
                        }

                        function getRegionForCoordinates(points) {
                            // points should be an array of { latitude: X, longitude: Y }
                            let minX, maxX, minY, maxY;

                            // init first point
                            ((point) => {
                                minX = point.latitude;
                                maxX = point.latitude;
                                minY = point.longitude;
                                maxY = point.longitude;
                            })(points[0]);

                            // calculate rect
                            points.map((point) => {
                                minX = Math.min(minX, point.latitude);
                                maxX = Math.max(maxX, point.latitude);
                                minY = Math.min(minY, point.longitude);
                                maxY = Math.max(maxY, point.longitude);
                            });

                            const midX = (minX + maxX) / 2;
                            const midY = (minY + maxY) / 2;

                            var deltaX = (maxX - minX) * 1.4;
                            var deltaY = (maxY - minY) * 1.4;

                            if (Object.entries(points).length == 1) {
                                deltaX = 0.01;
                                deltaY = 0.01;
                            }

                            return {
                                latitude: midX,
                                longitude: midY,
                                latitudeDelta: deltaX,
                                longitudeDelta: deltaY
                            };
                        }

                        document.addEventListener('DOMContentLoaded', function () {
                            // setTimeout(() => {
                            //     myMap();
                            // }, 1000)
                            const septicMarkers = [
                                    @foreach($markersMap as $marker)
                                [{
                                    lat: {{$marker['lat']}},
                                    lng: {{$marker['lng']}}}, '{{$marker['product_title']}}', '{{$marker['product_link']}}', '{{$marker['price']}}', '{{$marker['comment']}}'],
                                @endforeach
                            ];

                            var center = getRegionForCoordinates(septicMarkers.map(x => {
                                return {latitude: x[0]['lat'], longitude: x[0]['lng']};
                            }));

                            var mymap = L.map('map').setView([center.latitude, center.longitude], 5);

                            L.tileLayer('https://api.mapbox.com/styles/v1/civol43275/ckor459sy5bxi17lel99hihmc/tiles/512/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiY2l2b2w0MzI3NSIsImEiOiJja29veHVrdzUwN3B1Mm5zdG41cnI3OGRhIn0.LWoq4a6bjqRpoC86wDKFAQ', {
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                maxZoom: 18,
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'pk.eyJ1IjoiY2l2b2w0MzI3NSIsImEiOiJja29veHVrdzUwN3B1Mm5zdG41cnI3OGRhIn0.LWoq4a6bjqRpoC86wDKFAQ'
                            }).addTo(mymap);

                            var markers = [];


                            var Icon = new L.Icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                            });

                            septicMarkers.forEach(([position, product_title, product_link, price, comment], i) => {
                                var marker = L.marker([position['lat'], position['lng']], {icon: Icon});

                                marker.bindPopup($('#markerWindow').html().replace('|PRODUCT_TITLE|', product_title).replace('|PRODUCT_LINK|', product_link).replace('|PRICE|', price).replace('|COMMENT|', comment)).openPopup();

                                marker.addTo(mymap);
                                markers.push(marker);
                            });

                        });
                    </script>

            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdvhRlW-gTK_gP4kkFb4HQALJhwAO9FCQ&callback=myMap"></script>--}}
@endsection


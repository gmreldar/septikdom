<section id="card-six">
    <div class="wrapper">
        <div class="title-box">
            <div class="title-content">
                <h2 class="title">Карта</h2>
                <span>Выполненные работы</span>
            </div>
            <div class="subtitle">Здесь собраны выполненные работы</div>
        </div>
        <div>
            <div id="map" style="width:100%;height:600px"></div>
        </div>
    </div>

    <div id="markerWindow" style="display: none">
        <div class="">
            <span style="font-weight: bold">Продукт: <span style="font-weight: normal">|PRODUCT_TITLE|</span></span><br>
            <span style="font-weight: bold">Цена: <span style="font-weight: normal">|PRICE| руб</span></span><br>
            <span style="font-weight: bold">Комментарий: <span style="font-weight: normal">|COMMENT|</span></span>
        </div>
    </div>
</section>

@section('script')
    {{--<script src="https://openlayers.org/api/OpenLayers.js"></script>--}}
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=myMap"></script>--}}


@endsection

<script>
    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(62.0940418420403, 94.31975564893442),
            zoom: 3.5,
            mapTypeId: google.maps.MapTypeId.roadmap
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);


        const tourStops = [
                @foreach($markers as $marker)
            [{
                lat: {{$marker['lat']}},
                lng: {{$marker['lng']}}}, '{{$marker['product_title']}}', '{{$marker['product_link']}}', '{{$marker['price']}}', '{{$marker['comment']}}'],
            @endforeach
        ];

        // Create an info window to share between markers.
        const infoWindow = new google.maps.InfoWindow();
        // Create the markers.
        tourStops.forEach(([position, product_title, product_link, price, comment], i) => {
            const marker = new google.maps.Marker({
                position,
                map,
                title: '',
                label: '',
                optimized: false,
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
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
                @foreach($markers as $marker)
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
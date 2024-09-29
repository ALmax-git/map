<div class="card">

    <div class="card-body">
        <h5 class="card-title">Map of Schools (Satellite View)</h5>

        <!-- Map -->
        <div id="map" style="height: 350px;"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
        // Initialize the map centered at Maiduguri
        var map = L.map('map').setView([12.6729, 13.6160], 12);

        // Set up the Esri satellite tile layer
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
          attribution: 'Tiles © Esri'
        }).addTo(map);

        // School data passed from the server-side
        var schools = @json($schools);

        // Check if any schools were found in the database
        if (schools.length > 0) {
          // Loop through schools and add markers
          schools.forEach(function(school) {
            var lat = school.latitude;
            var lng = school.longitude;
            var name = school.name;
            var school_id = school.id;

            // Add marker for each school
            L.marker([lat, lng]).addTo(map)
              .bindPopup(`<b>${name}</b><br />Coordinates: (${lat}, ${lng}) <button class="btn btn-success btn-sm" wire:click='open_model(${school_id})'>View</button>`);
          });
        } else {
          // If no schools were found, add a default marker
          var defaultMarker = L.marker([11.8846, 13.1520]).addTo(map);
          defaultMarker.bindPopup("<b>No schools found in the database</b><br />Here is a default location.");
        }
      });
        </script>
        <!-- End Map -->

    </div>
    
    @if($model)
	  <div class="card mb-3">
	    <div class="row g-0">
	      <div class="col-md-4">
		<img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image" />
	      </div>
	      <div class="col-md-8">
		<div class="card-body">
		  <h5 class="card-title">{{ $school->name }}</h5>
		  <p class="card-text">
		    {!! $school->overview !!}
		  </p>
		  <p class="card-text"><small class="text-muted">{{ $school->created_at }}</small></p>
		</div>
	      </div>
	    </div>
	  </div>
    @endif
    
<!-- Add Leaflet.js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</div>

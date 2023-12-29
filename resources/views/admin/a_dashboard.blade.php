@extends('core_backend')

@section ('content')
<div class="page-body">
</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
      var options = {
        center:new google.maps.LatLng(-6.9147444,107.6098111), // longitude latitude bandung
        zoom:5,
        mapTypeId:google.maps.MapTypeId.ROADMAP // Tipe ROADMAP
      };
      // create map object
      var map=new google.maps.Map(document.getElementById("googleMap"),options);
    }
    // membuat Event Listener untuk memanggil fungsi initialize pada saat halaman selesai di load
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop
<html>
<head>
  <script type="text/javascript">
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        document.location.href =
          "http://maps.google.com/maps?q="
          + position.coords.latitude + ",+"
          + position.coords.longitude
          + "&iwloc=A&hl=fr";
      });
    }
  </script>
</head>
<body>
</body>
</html>
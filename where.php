<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Maria's Travels</title>

  <link rel="stylesheet" href="main.css">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
  <link rel="icon" href="https://cdn.iconscout.com/public/images/icon/free/png-512/aeroplane-airplane-plane-air-transportation-vehicle-pessanger-people-emoj-symbol-3306ff886517b0e9-512x512.png">
</head>
<?php
session_start(); ?>
<body>
  <nav class="nav-main">
    <div class="logo"><a href="https://localhost/maria/main.php">Maria's Travels</a></div>
    <ul>
      <li>
          <a href="javascript:void(0)" class="nav-item">Σας προτείνουμε...</a>
          <div class="nav-content">
            <div class="nav-sub">
              <ul>
                <li><a href="https://localhost/maria/ikaria.php">Ικαρία</a></li>
                <li><a href="https://localhost/maria/newyork.php">Νεα Υόρκη</a></li>
              </ul>
            </div>
          </div>
      </li>
      <li>
          <a href="https://localhost/maria/kratisi.php" class="nav-item">Κλείσιμο εκδρομής</a>
      </li>
      <li>
          <a href="https://localhost/maria/epikoinonia.php" class="nav-item">Επικοινωνήστε μαζί μας</a>
      </li>
      <li>
          <a href="https://localhost/maria/where.php" class="nav-item">Πού είμαστε;</a>
      </li>
      <?php if(isset($_SESSION['login_user'])){
        echo '<li><a href="https://localhost/maria/search.php" class="nav-item">Αναζήτηση Εκδρομής</a>'; }
        ?>
      <li>
        <?php if(!isset($_SESSION['login_user'])){echo '<a href="https://localhost/maria/login.php" class="nav-item">Είσοδος/Εγγραφή χρήστη</a>'; }
          else{echo '<a href="https://localhost/maria/logout.php" class="nav-item">Αποσύνδεση</a>'; } ?>
      </li>
    </ul>
    <?php if(isset($_SESSION['login_user'])) echo '<div class="nav-item"> Καλωσήρθες '.$_SESSION['login_user'].'</div>' ?>
</nav>
<br>
<div class="logomain">
  Maria's Travels
</div>
<h2> ΠΟΥ ΘΑ ΜΑΣ ΒΡΕΙΤΕ</h2>
<p> ΔΙΕΥΘΥΝΣΗ : Αργοναυτων 59, Μαρουσι <br> Τηλεφωνο Επικοινωνιας : 2108024522<p>
<br>
<div id="map" class="map"></div>
<br> <br>

<table cellpadding="5" cellspacing="5" class="ores">
<tr><td colspan="2" style="font-size:20px;">ΩΡΕΣ ΓΡΑΦΕΙΟΥ</td><tr>
<tr > <td>ΔΕΥΤΕΡΑ </td> <td>9:00-17:00 </td> </tr>
<tr > <td>ΤΡΙΤΗ</td> <td>9:00-17:00  </td> </tr>
<tr> <td>ΤΕΤΑΡΤΗ </td> <td>9:00-17:00  </td> </tr>
<tr> <td>ΠΕΜΠΤΗ </td> <td>9:00-17:00  </td> </tr>
<tr> <td>ΠΑΡΑΣΚΕΥΗ </td> <td>9:00-17:00  </td> </tr>
<tr> <td>ΣΑΒΒΑΤΟ </td> <td>ΚΛΕΙΣΤΑ </td></tr>
<tr> <td>ΚΥΡΙΑΚΗ </td> <td>ΚΛΕΙΣΤΑ </td> </tr>
</table>
<br> <br> <br> <br>
</body>

<script>
function myMap() {
var myCenter = new google.maps.LatLng(38.048201, 23.810444);
var mapCanvas = document.getElementById("map");
var mapOptions = {center: myCenter, zoom: 15};
var map = new google.maps.Map(mapCanvas, mapOptions);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXOIB2USUYp8jbyNlvbiD3pNT1Atr_Cyg&callback=myMap"></script>
</html>

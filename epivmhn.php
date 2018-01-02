<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Επιβεβαιωση Μηνυματος</title>

  <link rel="stylesheet" href="main.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="icon" href="https://cdn.iconscout.com/public/images/icon/free/png-512/aeroplane-airplane-plane-air-transportation-vehicle-pessanger-people-emoj-symbol-3306ff886517b0e9-512x512.png">
</head>
<?php
session_start(); ?>
<body>
  <nav class="nav-main">
    <div class="logo"><a href="https://localhost/maria/main.php">Maria's Travels</a></div>
    <ul>
      <li>
          <a href="https://localhost/maria/epikoinonia.php" class="nav-item">Επικοινωνήστε μαζί μας</a>
      </li>
      <li>
          <a href="https://localhost/maria/where.php" class="nav-item">Πού είμαστε;</a>
      </li>
      <li>
          <a href="kratisi.html" class="nav-item">Κλείσιμο εκδρομής</a> <!-- "#" allazeis me file, menei=dropdown -->
      </li>
      <li>
        <?php if(!isset($_SESSION['login_user'])){echo '<a href="https://localhost/maria/login.php" class="nav-item">Είσοδος/Εγγραφή χρήστη</a>'; }
          else{echo '<a href="https://localhost/maria/logout.php" class="nav-item">Αποσύνδεση</a>'; } ?>
      </li>
      <?php if(isset($_SESSION['login_user'])){
        echo '<li><a href="https://localhost/maria/search.php" class="nav-item">Αναζήτηση Εκδρομής</a>'; }
        ?>
      <li>
          <a href="javascript:void(0)" class="nav-item">Σας προτείνουμε...</a>
          <div class="nav-content">
            <div class="nav-sub">
              <ul>
                <li><a href="ikaria.html">35ήμερο στην Ικαρία</a></li>
                <li><a href="neyyork.html">1μιση μέρα στην Νεα Υόρκη</a></li>
              </ul>
            </div>
          </div>
      </li>
    </ul>
    <?php if(isset($_SESSION['login_user'])) echo '<div class="nav-item"> Καλωσήρθες '.$_SESSION['login_user'].'</div>' ?>
</nav>
<body>
<H1>ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ;;;;;;;</H1>

<table class="bordepik">
<tr> <td>  ΟΝΟΜΑΤΕΠΩΝΥΜΟ* </td>
<td id="pin1"> </td> </tr>
<tr> <td> ΤΗΛΕΦΩΝΟ </td>
<td id="pin2"> </td> </tr>
<tr> <td> EMAIL*  </td>
<td id="pin3"> </td> </tr>
<tr> <td>  ΕΡΩΤΗΜΑ* </td>
<td id="pin4"> </td> </tr>
</table>
<input type="reset" value="ΑΚΥΡΩΣΗ" onclick="byebye()">
<input type="button" value="ΑΠΟΣΤΟΛΗ" onclick="mailme()">
</form>
<script>
document.getElementById("pin1").innerHTML = localStorage.getItem("onoma");
document.getElementById("pin2").innerHTML = localStorage.getItem("thl");
document.getElementById("pin3").innerHTML = localStorage.getItem("email");
document.getElementById("pin4").innerHTML = decodeURIComponent(localStorage.getItem("quest")); //decode encoded special chars

function mailme() {
  var email = 'sample@gmail.com';
          var subject = 'Ερώτηση';
          var emailBody = 'Όνομα: '+localStorage.getItem("onoma")+'\n Τηλέφωνο: '+localStorage.getItem("thl")+' e-mail επικοινωνίας: '+localStorage.getItem("email")+' Ερώτηση: '+decodeURIComponent(localStorage.getItem("quest"));
          var attach = 'path';
          document.location = "mailto:"+email+"?subject="+subject+"&body="+emailBody;
}
function byebye(){
  window.close();
}

</script>

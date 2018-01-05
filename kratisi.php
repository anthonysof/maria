<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Κράτηση</title>

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
<form>
<table cellpadding="10" cellspacing="5" class="krattable">
<tr> <td > <label for="des"> <b>Προορισμός</b> </td>
  <td > <select id="des" name="des">
  <option value="100">Ικαρία</option>
  <option value="1500">New York</option>
</select></td> </tr>
<tr> <td > <label for="af"><b>Αναχώρηση </b></label> </td>
     <td><input type="date" name="af" id="af" required  min="<?php echo date('Y-m-d');?>"></td>
<tr><td > <label for="anax"><b>Επιστροφή</b> </label> </td>
    <td> <input type="date" id="anax" name="anax" required  > </tr>
<tr> <td > <label for="tic"><b>Εισιτήρια</b> </td>
     <td > <input type="text" id="tic" name="tic" maxlength="2" size="2"></td> </tr>
<tr > <td colspan="2"> <input class="buttonkrat"id="btn" type="submit" value="ΑΝΑΖΗΤΗΣΗ" onclick="validateForm()"> </td> </tr>
</table>
</form>
<script>
function validateField(data,regex) {
    return regex.test(data);
}
var af, anax, tic, des;
var p=0
function validateForm() {
	af= document.getElementById("af").valueAsDate;
  anax= document.getElementById("anax").valueAsDate;
	tic=document.getElementById("tic").value;
  des=document.getElementById("des").value;
  if (tic=="" || !(validateField(tic,/^[0-9]+$/)) || tic=="0")
  { p=1;
    alert("Συμπληρωστε αριθμο εισητηριων");}
  if (af>=anax)
  {p=1;
    alert("Δεν πρεπει η ημερομηνια αναχωρησης να ειναι πιο πριν απο την αφιξης ή να ειναι ιδιες");}
if (p==0)
{
localStorage.setItem("af", af);
localStorage.setItem("anax", anax);
localStorage.setItem("tic", tic);
localStorage.setItem("des", des);
tic=parseInt(document.getElementById("tic").value);
des=parseInt(document.getElementById("des").value);
var xreosi=tic*des;
localStorage.setItem("xreosi",xreosi);
window.open("https://localhost/maria/epivkrat.php");
}
}
</script>
</body>
</html>

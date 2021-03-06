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
    <div class="logo"><a href="main.php">Maria's Travels</a></div>
    <ul>
      <li>
          <a href="javascript:void(0)" class="nav-item">Σας προτείνουμε...</a>
          <div class="nav-content">
            <div class="nav-sub">
              <ul>
                <li><a href="ikaria.php">Ικαρία</a></li>
                <li><a href="newyork.php">Νεα Υόρκη</a></li>
              </ul>
            </div>
          </div>
      </li>
      <li>
          <a href="kratisi.php" class="nav-item">Κλείσιμο εκδρομής</a>
      </li>
      <li>
          <a href="epikoinonia.php" class="nav-item">Επικοινωνήστε μαζί μας</a>
      </li>
      <li>
          <a href="where.php" class="nav-item">Πού είμαστε;</a>
      </li>
      <?php if(isset($_SESSION['login_user'])){
        echo '<li><a href="search.php" class="nav-item">Αναζήτηση Εκδρομής</a>'; }
        ?>
      <li>
        <?php if(!isset($_SESSION['login_user'])){echo '<a href="login.php" class="nav-item">Είσοδος/Εγγραφή χρήστη</a>'; }
          else{echo '<a href="logout.php" class="nav-item">Αποσύνδεση</a>'; } ?>
      </li>
    </ul>
    <?php if(isset($_SESSION['login_user'])) echo '<div class="nav-item"> Καλωσήρθες '.$_SESSION['login_user'].'</div>' ?>
</nav>
<br>
<div class="logomain">
  Maria's Travels
</div>
<div class="content">
<form method="post">
<table style="margin:auto;">
  <tr> <td>  <b>ΠΡΟΟΡΙΣΜΟΣ </b></td>
  <td> <input type="text" id="pin1" name="dest" value="" style="text-align:center;"> </td> </tr>
  <tr> <td> <b>ΑΝΑΧΩΡΗΣΗ </b></td>
  <td> <input type="text" id="pin2" name="anax" value="" style="text-align:center;"> </td> </tr>
  <tr> <td><b> ΕΠΙΣΤΡΟΦΗ </b> </td>
  <td> <input type="text" id="pin3" name="epis" value="" style="text-align:center;"> </td> </tr>
  <tr> <td> <b> ΕΙΣΗΤΗΡΙΑ </b> </td>
  <td> <input type="text" id="pin4" name="tickets" value="" style="text-align:center;"> </td> </tr>
  <tr> <td> <b> ΧΡΕΩΣΗ</b> </td>
  <td> <input type="text" id="pin5" name="xreosi" value="" style="text-align:center;"> </td> </tr>
  <tr> <td> <b> E-MAIL</b> </td>
  <td> <?php if(isset($_SESSION['login_user'])){echo '<input type="text" id="pin6" name="email" value="'.$_SESSION['user_mail'].'" style="text-align:center;" readOnly> </td> </tr>';}
    else{ echo '<input type="email" id="pin6" name="email"></td></tr><tr><td colespan="2">*ΣΥΜΠΛΗΡΩΣΕ ΤΟ ΜΕΙΛ ΣΟΥ*</td></tr>';} ?>
  </table>
  <input class="buttonsreg" type="button" value="ΑΚΥΡΩΣΗ" onclick="bye()" style="margin-top:20px;">
  <input class="buttonsreg" type="submit" name="submit" value="ΑΠΟΣΤΟΛΗ" style="margin-top:20px;">
  </form>
</div>
</body>
  <script>
  var dest=localStorage.getItem("des");
   if (dest=="100")
  {
    document.getElementById("pin1").value = "Ικαρία";
  }
  else {
    document.getElementById("pin1").value = "New York";
  }
  document.getElementById("pin1").readOnly = true; //για να παρει πρωτα το value και μετα ειναι σαν να βαζει στο ινπυτ το readonly

  document.getElementById("pin2").value = localStorage.getItem("af");
  document.getElementById("pin2").readOnly = true;
  document.getElementById("pin3").value = localStorage.getItem("anax");
  document.getElementById("pin3").readOnly = true;
  document.getElementById("pin4").value = localStorage.getItem("tic");
  document.getElementById("pin4").readOnly = true;
  var cost = localStorage.getItem("xreosi");
  cost += "€"; //προσθετει το συμβολο του ευρω
  document.getElementById("pin5").value = cost;
  document.getElementById("pin5").readOnly = true;
  function bye(){
    if(confirm("Κλείσιμο παραθύρου;")){
    window.close(); }
  }
</script>
<?php
if(isset($_POST['submit'])&&isset($_POST['email'])){
  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ //ετοιμη συναρτηση αν το ιμειλ ειναι σωστο
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "userdb";
  $conn = mysqli_connect($servername,$username,$password,$dbname);//αν τα εχει παρει τα ορισματα θα μας αφησει να μπουμε αλλιως θα μας πεταξει ερορ
  if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
  mysqli_set_charset($conn,"utf8");//πρωτο ορισμα το κον για να πω σε ποια συνδεση ειμαι
  $user_mail = mysqli_real_escape_string($conn, $_POST['email']); //extra security για να κανει escape τα special cars
  $sql = "INSERT INTO kratiseis (ekdromi, anaxorisi, epistrofi, tickets, email,cost)
  VALUES ('".$_POST['dest']."','".$_POST['anax']."','".$_POST['epis']."','".$_POST['tickets']."','".$user_mail."','".$_POST['xreosi']."')";
  if (mysqli_query($conn, $sql)) {
      echo "Έγινε η κράτηση";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
}else{
  echo "Εισάγετε έγκυρη μορφή E-mail";
}
}
 ?>

</html>

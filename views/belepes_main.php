<br>
<br>
  <div class="guest">
    <fieldset>
    <legend><h3>Bejelentkezés:</h3></legend>
    <br>
    <div class="g2">
      <form name="belepes" action="<?= SITE_ROOT ?>beleptet" method="post">
      <label for="login">Felhasználó:</label><input type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
      <label for="password">Jelszó:</label><input type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
      <input type="submit" value="Belépés"><br>
      </form>
      <?php //if(isset($belepes_hiba) && strlen(trim($belepes_hiba)) > 0) echo "<div class=\"uzenet\">".$belepes_hiba."</div>"; ?>
    </div>
    </fieldset>
<br><br>
    <fieldset>
    <legend><h3>Regisztráció</h3></legend>
    <br>
    <div class="g2">
      <form name="regisztracio" action="<?= SITE_ROOT ?>regisztracio" method="post">
      <label for="csaladi_nev">Családi név:</label> <input type = "text" name="csaladi_nev" id = "csaladi_nev"><br>
      <label for="utonev">Utónév:</label> <input type = "text" name="utonev" id = "utonev"><br>
      <label for="bejelentkezes">Login:</label> <input type = "text" name="login" id = "login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
      <label for="jelszo">Jelszó:</label> <input type = "password" name="jelszo" id = "jelszo" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br> 
      <input type="submit"  value="Regisztráció"><br>
      </form>
      <?php
       ?>
    </div>
    </fieldset>
  </div>
  
  <h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
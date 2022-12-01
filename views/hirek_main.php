<<h1><br>Hírek<br></h1>

<div class="news">
  <fieldset>  

    <table>
            <td>
            
            <table class="hirek">
                <tr> 
                    
                    <form name="hirek" action="<?= SITE_ROOT ?>hirek" method="POST">
                    <label for="message">Üzenet:</label><textarea name="message" id="message" rows="4" cols="40"></textarea>
                    <input id="kuld" type="submit" value="Küld">
                    </form>
                    
                </tr>

                <tr>
                               
                    <th>Feladó</th>
                    <th>Üzenet</th>
                    <th>Dátum</th>
                    <?php

                    for ($i=0; $i < $_SESSION['cnt'] ; $i++) { 
                    
                        print_r("<tr><td>".$_SESSION['felhasznalo'.$i]."</td><td>".$_SESSION['hir'.$i]."</td><td>".$_SESSION['time'.$i]."</td>")."</tr>"; 
                   }
                   ?>
                </tr>

            </table>
            
        </td>
        
    
</table>

</fieldset>
</div>

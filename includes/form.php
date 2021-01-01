<h2 id="restricted">Restricted access</h2>
<p id="credentials">Please enter your credentials</p>
<?php if ($bool) {
    echo "<p style='visibility: visible;' id='loginFailed'>Login failed !</p>";
 } else {
    echo "<p style='visibility: hidden;'>Login failed !</p>";
 } ?>
<form method="post" action="" class="flex">
    <p class="flex">
        <label for="email" class="flex">Email <span id="mailError" class="error">Invalid format !</span></label>
        <input type="email" name="email" id="email" class="input" placeholder="john.doe@example.com">
    </p>
    <p class="flex">
        <label for="password" class="flex">Password <span id="pwdError" class="error">Invalid format !</span></label>
        <input type="password" name="password" id="password" class="input" placeholder="...">
        
    </p>
    <!-- <button type="submit" name="submit" id="submit" disabled>Valider</button> -->
    <input type="submit" namue="submit" id="submit" value="Enter" disabled>
</form>
<script src="script.js"></script>
<?php
require("../config/function.php");

if (isset($_SESSION['auth'])) {
   logoutSession();
   return redirect('/login.php', 'Anda Telah Logout');
}
redirect('/login.php', 'Anda Telah Logout');

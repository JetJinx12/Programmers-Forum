<?php

/*
 * No copyright is aloud
 * but only from the studio or if you ask...
 * Author: M-Dawg
 */

// Include the includes
include_once 'includes/main.inc.php';

if (isset($_SESSION["id"])) {
    $qry = "select * from users where id=" . $_SESSION["id"];
    $result = $db->select($qry);
}
    $qry = "select * from topics";
    $r = $db->select($qry);

$user = (isset($_SESSION["id"]) ? $result[0]["username"] : "Guest");

echo '<html>
    <head>
    <title></title>
    </head>
    <body>';

echo 'Welcome, ' . $user . '!
        <span style="float:right;clear:right;text-align:right">[' . (isset($_SESSION["id"]) ? '
        <a href="logout.php">Logout' : '<a href="login.php">Login</a>|<a href="register.php">Register') . '</a>]</span>
            <center>' . (($result[0]["authlvl"] == 9) ? '<a href="authlvl.php">Change authority levels</a>|
                <a href="addtopic.php">Add a topic</a>' : '') . '</center>

<center><span style="font-size:35px">Programmers Forum</span><br />
<hr />
<span style="font-size:25px">Programming Topics</span>
</center>';
echo '<center>';
foreach ($r as $k => $ra){
    echo '<br /><span style="font-size:20px"><a href="' . $ra["link"] . '.php">' . $ra["name"] . '</a></span><br /><hr />';
}
echo '</center>';
//echo '
//<center><p style="text-align:center; position:absolute; bottom: 0px">&copy; Copyright "M-Dawg\'s Lair" </p> </center> ';
echo '</body></head>';
?>

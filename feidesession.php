<?php
/*//Function to override standard session timeout
function my_session_start($timeout = 3600) {
    ini_set('session.gc_maxlifetime', $timeout);
    session_start();

    if (isset($_SESSION['timeout_idle']) && $_SESSION['timeout_idle'] < time()) {
        session_destroy();
        session_start();
        session_regenerate_id();
        $_SESSION = array();
    }

    $_SESSION['timeout_idle'] = time() + $timeout;
}

my_session_start();


//Destroys the session if the user switches IP. Measure again session-hijacking.
if ($_SESSION["session-ip"] != $_SERVER['REMOTE_ADDR']) {
    $_SESSION = array(); //Dropping all session variables
    session_destroy(); //Destroying session
    header("Location: feide_login.php");
}

if (isset($_SESSION['fusername'])) {

    //User is logged in, do nothing
} else {
    session_destroy(); //Destroying session
    header("Location: feide_login.php");
}

include('auth_pdo.php');
*/?>
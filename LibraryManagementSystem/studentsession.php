<?php
require_once('connection.php');
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
$session_id = $_SESSION['id'];
?>
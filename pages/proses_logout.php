<?php
 session_start();
 unset($_SESSION['masuk']);
echo "<script>alert('Terimah Kasih');
    document.location.href='../login.php'</script>\n";
?>

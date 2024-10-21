<?php
    echo '<script type="text/javascript"> ';
    echo ' function goback(newurl) {';
    echo '    document.location = newurl;';
    echo '  }';
    echo 'goback(\'/event/access?qrcode='.$qr_code.'\')';
    echo '</script>';
?>
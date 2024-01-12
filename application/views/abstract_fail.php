<?php
    echo '<script type="text/javascript"> ';
    echo ' function goback(newurl) {';
    echo '  if (confirm("email과 성함을 확인해주세요.")) {';
    echo '    document.location = newurl;';
    echo '  }';
    echo '}';
    echo 'goback(\'/score\')';
    echo '</script>';
?>
<?php
// MySQLi 확장이 로드되어 있는지 확인합니다.
if (extension_loaded('mysqli')) {
    echo "MySQLi 확장이 로드되었습니다.";
} else {
    echo "MySQLi 확장이 로드되지 않았습니다.";
}
?>
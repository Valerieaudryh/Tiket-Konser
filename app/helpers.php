<?php 
function shortNumber($num) 
{
    $units = ['', 'K', 'Jt', 'M', 'T'];
    for ($i = 0; $num >= 1000; $i++) {
        $num /= 1000;
    }
    return 'Rp ' . round($num, 1) . ' ' . $units[$i];
}
?>
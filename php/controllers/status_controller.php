<?php
    if($level < 30) {
        $status = 'bg-danger';
    } else if($level < 70) {
        $status = 'bg-warning';
    } else{
        $status = 'bg-success';
    }
?>
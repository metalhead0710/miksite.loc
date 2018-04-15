<?php

class Feedback
{
    public static function success($message)
    {
        if($message != '')
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Успіх!</strong>'. $message.'</div>';
    }
    public static function error($message)
    {
        if($message != '')
            echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Помилка!</strong>'. $message.'</div>';
    }
} 
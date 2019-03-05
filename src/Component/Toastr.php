<?php

namespace App\Component;
use App\Component\Toastr;

class Toastr {

    public static function flashcard($type, $title, $message){

        $_SESSION['toastr'] = array(
            'type'      => $type, // error or 'success' or 'info' or 'warning'
            'message' => $message,
            'title'     => $title
          );

        echo "<script>  $(function(){";
      
        if(isset($_SESSION['toastr']))
        {
            echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
            unset($_SESSION['toastr']);
        }
                
        echo "});</script>"; 
    }

}

?>
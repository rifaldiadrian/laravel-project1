<?php
  
/**
 * Write code on Method
 *
 * @return response()
 */
function getNotification($action,$title,$msg){
    if($action == "success"){
        $icon = "check";
    }elseif ($action == "danger") {
        $icon = "ban";
    }elseif ($action == "warning") {
        $icon = "exclamation-triangle";
    }elseif ($action == "info") {
        $icon = "info";
    }
    echo '<div class="alert alert-'.$action.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-'.$icon.'"></i><b> '.$title.'</b></h6>
            '.$msg.'
            </div>';
}


// if (! function_exists('moneyFormat')) {
//     function moneyFormat($amount)
//     {
//         return '$' . number_format($amount, 2);
//     }
// }
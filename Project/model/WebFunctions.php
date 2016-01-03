<?php

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 26/12/15
 * Time: 11:35
 */
class WebFunctions
{
    /**
     * Creates the pagination controls of a webpage
     * @param $currentPage
     * @param $totalNumberOfPages
     * @return pagaination controls for webpage
     */
     public static function pagination($currentPage, $totalNumberOfPages)
    {
        $pre = "";
        $count = "";
        $nex = "";
        $previous_page = $currentPage - 1;
        $next_page = $currentPage + 1;

        if(!($currentPage <=1)){    // if less than or equal to 1 --> no previous page
            $pre =  "<li><a href='?current_page=$previous_page'>Prev</a></li>";
        }
        if ($totalNumberOfPages >= 1){  // if total number of pages greater or equal 1 --> set all pages
            $count = "";
            for($x=1;$x<=$totalNumberOfPages;$x++){
                $count .=  ($x == $currentPage) ? '<li class="active"><a href="?current_page='.$x.'">'.$x.'</a></li> ' : '<li><a href="?current_page='.$x.'">'.$x.'</a></li>' ;
            }
        }
        if(!($currentPage>=$totalNumberOfPages)){   // if currentPage is greater or equal to total number of pages/projects --> no next page
            $nex = "<li><a href='?current_page=$next_page'>Next</a></li>";
        }
        return $pre.$count.$nex;
    }

    public static function authenticateUser(){
        session_start();
        if(!isset($_SESSION['trainer_id']) || !isset($_SESSION['student_id'])){
            return false;
        }
        else{
            return true;
        }
    }



}
<?php

require_once "../model/ProjectModel.php";
require_once "HttpResource.php";

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 26/12/15
 * Time: 11:28
 */
class ProjectApi extends HttpResource
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    protected function do_get()
    {
        $params = explode( "/", $_GET['trainer-id'] );
        for($i = 0; $i < count($params); $i+=2) {

            echo $params[$i] ." has value: ". $params[$i+1] ."<br />";

        }

        $rowCount = count(ProjectModel::getAllProjects(0));
        $this->statusCode = 200;
        // Produce utf8 encoded json
        $this->headers[] = "Content-type: text/json; charset=utf-8";
        $this->body = json_encode($rowCount);
    }

}

ProjectApi::run();
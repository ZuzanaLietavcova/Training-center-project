<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("HttpResource.php");
require_once("../model/TeamModel.php");

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 23/12/15
 * Time: 10:43
 */
class TeamApi extends HttpResource
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    protected function do_get()
    {
        parent::do_get(); // TODO: Change the autogenerated stub
    }

    protected function do_post()
    {
        if (empty($_POST["student_id"])) {
            $this->exit_error(400, "studentIDMandatoryAndNotEmpty");
        }
        else if (empty($_POST["team_id"])) {
            $this->exit_error(400, "teamIDMandatoryAndNotEmpty");
        }
        else{
            $student_id = $_POST["student_id"];
            $team_id = $_POST["team_id"];
            TeamModel::addStudentToTeam($student_id, $team_id);
        }
    }

    protected function do_put()
    {
        parse_str(file_get_contents("php://input"), $_PUT);
        if (empty($_PUT["summary"])) {
            $this->exit_error(400, "summaryMandatoryAndNotEmpty");
        }
        else if (empty($_PUT["team_id"])) {
            $this->exit_error(400, "teamIDMandatoryAndNotEmpty");
        }
        else{
            $summary = $_PUT["summary"];
            $team_id = $_PUT["team_id"];
            TeamModel::updateTeamSummary($summary,$team_id);
        }
    }

    protected function do_head()
    {

    }

    protected function do_delete()
    {
        parse_str(file_get_contents("php://input"), $_DELETE);
        if (empty($_DELETE["student_id"])) {
            $this->exit_error(400, "studentIDMandatoryAndNotEmpty");
        }
        else if (empty($_DELETE["team_id"])) {
            $this->exit_error(400, "teamIDMandatoryAndNotEmpty");
        }
        else{
            $student_id = $_DELETE["student_id"];
            $team_id = $_DELETE["team_id"];
            TeamModel::removeStudentFromTeam($student_id, $team_id);
        }
    }

}

TeamApi::run();
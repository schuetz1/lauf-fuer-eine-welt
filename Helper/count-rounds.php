<?php
/**
 * Created by PhpStorm.
 * User: karstenschutz
 * Date: 06.07.17
 * Time: 22:40
 */

require 'DatabaseHelper.php';

class CountRounds
{

    protected $updateKilometer;
    protected $updatedreiRounds;
    protected $updatefuenfRounds;
    protected $restKilometer;

    public function run()
    {

        if ($_GET['kilometer'] == 3) {
            $this->updateDrei();
        } elseif ($_GET['kilometer'] == 5) {
            $this->updateFuenf();
        } elseif ($_GET['reset'] == 1) {
            $this->resetHard();
        } elseif ($_GET['round-back'] == 3) {
            $this->threeRoundsBack();
        } elseif ($_GET['round-back'] == 5) {
            $this->fiveRoundsBack();
        }

        //$this->updateLaufDatabase($rounds);
    }

    protected function getLaufData()
    {
        $database = new \KarstenScripts\DatabaseHelper();
        $laufdata = $database->getRow('
          SELECT
                total,
                drei,
                fuenf,
                missing
          FROM
              counter
    ');
        return $laufdata;
    }

    protected function updateDrei()
    {
        $laufdata = $this->getLaufData();

        $this->updateKilometer = $laufdata['total'] + 3;
        $this->updatedreiRounds = $laufdata['drei'] + 1;
        $this->restKilometer = $laufdata['missing'] - 3;

        $database = new \KarstenScripts\DatabaseHelper();
        $database->getResult('
        UPDATE counter
        SET total = \'' . $this->updateKilometer . '\' , 
            drei = \'' . $this->updatedreiRounds . '\', 
            missing = \'' . $this->restKilometer . '\'
        WHERE id = 1
        ');
    }

    protected function threeRoundsBack()
    {
        $laufdata = $this->getLaufData();

        $this->updateKilometer = $laufdata['total'] - 3;
        $this->updatedreiRounds = $laufdata['drei'] - 1;
        $this->restKilometer = $laufdata['missing'] + 3;

        $database = new \KarstenScripts\DatabaseHelper();
        $database->getResult('
        UPDATE counter
        SET total = \'' . $this->updateKilometer . '\' , 
            drei = \'' . $this->updatedreiRounds . '\', 
            missing = \'' . $this->restKilometer . '\'
        WHERE id = 1
        ');
    }

    protected function updateFuenf()
    {
        $laufdata = $this->getLaufData();

        $this->updateKilometer = $laufdata['total'] + 5;
        $this->updatefuenfRounds = $laufdata['fuenf'] + 1;
        $this->restKilometer = $laufdata['missing'] - 5;

        $database = new \KarstenScripts\DatabaseHelper();
        $database->getResult('
        UPDATE counter
        SET total = \'' . $this->updateKilometer . '\' , 
            fuenf = \'' . $this->updatefuenfRounds . '\', 
            missing = \'' . $this->restKilometer . '\'
        WHERE id = 1
        ');
    }

    protected function fiveRoundsBack()
    {
        $laufdata = $this->getLaufData();

        $this->updateKilometer = $laufdata['total'] - 5;
        $this->updatefuenfRounds = $laufdata['fuenf'] - 1;
        $this->restKilometer = $laufdata['missing'] + 5;

        $database = new \KarstenScripts\DatabaseHelper();
        $database->getResult('
        UPDATE counter
        SET total = \'' . $this->updateKilometer . '\' , 
            fuenf = \'' . $this->updatefuenfRounds . '\', 
            missing = \'' . $this->restKilometer . '\'
        WHERE id = 1
        ');
    }

    protected function resetHard()
    {
        $database = new \KarstenScripts\DatabaseHelper();
        $database->getResult('
        UPDATE counter
        SET total = 0, 
            drei = 0,
            fuenf = 0, 
            missing = 1500
        WHERE id = 1
        ');
    }
}

$countRounds = new CountRounds();
$countRounds->run();



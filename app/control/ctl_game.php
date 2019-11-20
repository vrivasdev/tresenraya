<?php 

include_once '../lib/base_inc.php';

class GameController {

    private $vo;
    private $err;
    private $msj;
    private $dao;

    function __construct() {
        try {
            $factory = new Factory();

            $this->vo = $factory->getVO('game');
            $this->dao = $factory->getDAO('game');
            
            $this->parseForm();

            switch($this->vo->action) {
                case 'createMovement':
                    $this->createMovement();
                break;
            }

        } catch(Exception $e) {
            $this->err = $e->getMessage();
        }
    }

    private function createMovement() {
        $response = ['status' => 'gamming'];
        $cV = $cD = $cID = ['o' => 0, 'x' => 0]; //  vertical counter
        
        foreach ($this->vo->matrix as $i => $row) {
            $cH = 0; // horizontal counter
            foreach($row as $j => $value) {
                // Horizontal Match
                if (($j > 0)  && ($value === $row[$j-1]) && ($value !== 'empty')) {
                    if (++$cH === 2) {
                        $response = ['status' => 'win', 'type' => 'horizontal', 'user' => $this->vo->user];
                    }
                }
                // Vertical match
                if (($i > 0)  && ($value === $this->vo->matrix[$i-1][$j]) && ($value !== 'empty')) {
                    if (++$cV[$value] === 2) {
                        $response = ['status' => 'win', 'type' => 'vertical', 'user' => $this->vo->user];
                    }
                }
                // Diagonal match
                if (($i > 0) && ($j > 0)  && ($value === $this->vo->matrix[$i-1][$j-1]) && ($value !== 'empty')) {
                    if (++$cD[$value] === 2) {
                        $response = ['status' => 'win', 'type' => 'diagonal', 'user' => $this->vo->user];
                    }
                }
                // Diagonal inverted match
                if (($i == 2 && $j == 0) || ($i == 1 || $j == 1)) {
                    if(!empty($this->vo->matrix[$i-1][$j+1])){
                        if (($value === $this->vo->matrix[$i-1][$j+1]) && ($value !== 'empty')) {
                            if (++$cID[$value] === 2) {
                                $response = ['status' => 'win', 'type' => 'diagonal', 'user' => $this->vo->user];
                            }
                        }
                    }
                }
            }
        }
        
        $this->vo->response = json_encode($response);

        if ($response['status'] == 'win') {
            $this->dao->Insert($this->vo);
        }

        echo json_encode($response);
    }

    private function parseForm() {
        $data = json_decode(file_get_contents("php://input"));

        if(!$data) {
            die('Post error'); // TODO: Add some exception
        }

        $this->vo = (object)array();

        $this->vo->action = $data->action;
        $this->vo->matrix = $data->matrix;
        $this->vo->user = $data->user;
        $this->vo->game_id = $data->game_id;
    }
}

$gameController = new GameController();

?>

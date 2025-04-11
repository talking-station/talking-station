<?php
// user 로그인하면 메인 index가 될텐데 UserController에서 해야할지 MateController에서 해야할지 모르겠음
namespace Controllers;
use Controllers\Controller;
use Models\Mate;

class MateController extends Controller {   
    private $arrMateList = [];
    
    private $main_user_id = '';
    private $related_user_id = '';

    // getter
    public function getArrMateList(){
        return $this->arrMateList;
    }

    // setter
    public function setArrMateList($arrMateList){
        $this->arrMateList = $arrMateList;
    }

    protected function main() {
        $requestData = [
            // 'main_user_id' => isset($_POST['main_user_id']) ? $_POST['main_user_id'] : '0'
            'main_user_id' => '1'
            ,'mate_status' => '1'
        ];

        $this->main_user_id = $requestData['main_user_id'];

        // 친구 리스트 획득
        $mateList = new Mate();
        $this->setArrMateList($mateList->getArrMateList($requestData));

        return 'main.php';
    }
}

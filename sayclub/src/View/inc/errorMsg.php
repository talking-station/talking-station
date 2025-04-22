<div id="errorMsg" class="text_danger">
    <?php
        echo implode('<br>', $this->arrErrorMsg);
        // var_dump($this->arrErrorMsg);
        // implode : 배열을 문자열로 변환
        // 아직 Controller 영역 안이라서 $this 사용 가능
    ?>
</div>
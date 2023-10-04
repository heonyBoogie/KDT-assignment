<?php
    function log_ip($_id,$_pw){
        $log = fopen("log.txt", "a");
        fwrite($log,date("Y-m-d H:i:s")."/IP:".$_SERVER['REMOTE_ADDR']."/id:".$_id."/password:".$_pw."\n");
        fclose($log);
        return;
    }
    
    if($_SERVER['HTTP_REFERER'] == '') exit("잘못된 접근입니다.");
    $input_id = NULL;
    $input_pw = NULL;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "request method : POST<br>";
        $input_id = $_POST['input_id'];
        $input_pw = $_POST['input_pw'];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo "reqeust method : GET<br>";
        $input_id = $_GET['input_id'];
        $input_pw = $_GET['input_pw'];
    } else {
        echo "처리할 수 없는 요청 방식 입니다.<br>";
        exit("400 bad request");
    }
    
    $account_handle = fopen("account.txt", "r");
    $id = trim(fgets($account_handle));# fgets -> white space를 포함하여 line by line으로 내용 읽어온다.
    $pw = trim(fgets($account_handle));
    fclose($account_handle);

    if ($id === $input_id){
        if($pw === $input_pw){
            echo "로그인 성공<br>";
            return;   
        }
        log_ip($input_id,$input_pw);
        echo "아이디 또는 비밀번호를 잘못 입력했습니다.<br>";
    }else{
        log_ip($input_id,$input_pw);
        echo "아이디 또는 비밀번호를 잘못 입력했습니다.<br>";
    }
?>
    
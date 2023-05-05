<?php
// TODO : 로그아웃 파일 만들기

// db 연결
function db_conn(&$param_conn)
{
    $host = "localhost";
        $user = "root";
        $pass = "root506";
        $charset = "utf8mb4";
        $db_name = "study_group";
        $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset;
        $pdo_option =
            array(
                PDO::ATTR_EMULATE_PREPARES      => false
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
            );

        try
        {
            $param_conn = new PDO( $dns, $user, $pass, $pdo_option );
        }
        catch (Exception $e)
        {
            $param_conn = null;
            throw new Exception( $e->getMessage() );
        }
    
}

// ---------------------------------
    // 함수명	: select_id_pw
    // 기능		: 해당 id,pw 값으로 전체 정보 불러옴
    // 파라미터	: &$param_arr
    // 리턴값	: Array/String  $result/ERRMSG
// ---------------------------------
function select_id_pw(&$param_arr)
{
    $sql = 
        " SELECT "
            ." * "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_id = :login_id "
            ." AND "
            ." login_password = :login_password "
        ;
    $arr_prepare = array(
        ":login_id" => $param_arr["login_id"]
        ,":login_password" => $param_arr["login_password"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result = $stmt->fetchAll();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}

// ---------------------------------
    // 함수명	: select_row_num
    // 기능		: 해당하는 값 있을 때, 행 갯수 반환
    // 파라미터	: &$param_arr
    // 리턴값	: INT/String  $result_cnt/ERRMSG
// ---------------------------------
function select_row_num(&$param_arr)
{
    $sql = 
        " SELECT "
            ." * "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_id = :login_id "
            ." AND "
            ." login_password = :login_password "
        ;
    $arr_prepare = array(
        ":login_id" => $param_arr["login_id"]
        ,":login_password" => $param_arr["login_password"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result_cnt = $stmt->rowCount();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result_cnt;
}

// ---------------------------------
    // 함수명	: insert_info
    // 기능		: 정보 db에 insert
    // 파라미터	: &$param_arr
    // 리턴값	: String  ERRMSG
// ---------------------------------
function insert_info(&$param_arr)
{
    $sql = 
        " INSERT INTO"
        ." login "
        ." VALUES ( "
            ." :login_id "
            ." ,:login_password "
            ." ,:login_email "
            ." ) "
        ;
    $arr_prepare = array (
        ":login_id" => $param_arr["login_id"]
        ,":login_password" => $param_arr["login_password"]
        ,":login_email" => $param_arr["login_email"]
    );

    $conn = null;

    try 
    {
        db_conn($conn);
        $conn->beginTransaction();
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $conn->commit();
    }
    catch (Exception $e)
    {
        $conn->rollback();
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }


}

// ---------------------------------
    // 함수명	: select_email
    // 기능		: 해당 email 값으로 전체 정보 불러옴
    // 파라미터	: &$param_arr
    // 리턴값	: Array/String  $result[0]/ERRMSG
// ---------------------------------
function select_id_email(&$param_arr)
{
    $sql = 
        " SELECT "
            ." login_id "
            ." ,login_email "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_id = :login_id "
            ." AND "
            ." login_email = :login_email "
        ;
    $arr_prepare = array(
        ":login_id" => $param_arr["login_id"]
        ,":login_email" => $param_arr["login_email"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result = $stmt->fetchAll();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result[0];
}
// $arr = array("login_id" => "bu01144", "login_email" => "bu01144@naver.com");
// print_r(select_id_email($arr));

function select_email(&$param_arr)
{
    $sql = 
        " SELECT "
            ." login_id "
            ." ,login_email "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_email = :login_email "
        ;
    $arr_prepare = array(
        ":login_email" => $param_arr["login_email"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result = $stmt->fetchAll();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result[0];
}

function select_pass(&$param_arr)
{
    $sql = 
        " SELECT "
            ." login_password "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_id = :login_id "
            ." AND "
            ." login_email = :login_email "
        ;
    $arr_prepare = array(
        ":login_id" => $param_arr["login_id"]
        ,":login_email" => $param_arr["login_email"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result = $stmt->fetchAll();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result[0];
}

// ---------------------------------
//     함수명	: select_row_num_id
//     기능		: 해당하는 값 있을 때, 행 갯수 반환
//     파라미터	: &$param_arr
//     리턴값	: INT/String  $result_cnt/ERRMSG
// ---------------------------------
function select_row_num_id(&$param_arr)
{
    $sql = 
        " SELECT "
            ." * "
        ." FROM "
            ." login "
        ." WHERE "
            ." login_id = :login_id "
        ;
    $arr_prepare = array(
        ":login_id" => $param_arr["login_id"]
    );

    $conn = null;
    try
    {
        db_conn($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_prepare);
        $result_cnt = $stmt->rowCount();
    }
    catch( Exception $e )
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result_cnt;
}

// $arr=array("login_id" => "bu01144", "login_password" => "123");
// var_dump(select_row_num($arr));


?>
<?php
//class DB{
//
//
//    public $error;
//
//    public function getData($sql){
//        try{
//            $result = $this->pdo->query($sql);
//            return $result;
//        }catch(\Exception $e){
//            return null;
//        }
//    }
//
//    public function sendQuery($sql){
//        try{
//            $this->pdo->exec($sql);
//            return true;
//        }catch(\Exception $e){
//            return false;
//        }
//    }
//
//    // select and 문
//    public function selectAnd($value, $table, $where){
//        //$sql = 'SELECT '.$value.' FROM '.$table.' WHERE '.$where.'='.$where;
//        $sql = 'SELECT ';
//        $cnt = 0;
//        foreach($value as $val){
//            $cnt++;
//
//            if(count($value)==$cnt){
//                $sql .= $val;
//            }else{
//                $sql .= $val.',';
//            }
//
//        }
//
//        $sql .= ' FROM '.$table;
//
//        $sql .= ' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//
//            if(count($where)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' AND ';
//            }
//
//        }
//        return $sql;
//    }
//
//    // select Or 문
//    public function selectOr($value, $table, $where){
//        //$sql = 'SELECT '.$value.' FROM '.$table.' WHERE '.$where.'='.$where;
//        $sql = 'SELECT ';
//        $cnt = 0;
//        foreach($value as $val){
//            $cnt++;
//
//            if(count($value)==$cnt){
//                $sql .= $val;
//            }else{
//                $sql .= $val.',';
//            }
//
//        }
//
//        $sql .= ' FROM '.$table;
//
//        $sql .= ' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//
//            if(count($where)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' OR ';
//            }
//
//        }
//        return $sql;
//    }
//
//    // update and 문
//    public function updateAnd($table, $value, $where){
//        //$sql = 'UPDATE [테이블] SET [열]= '변경할값' WHERE [열] is null';;
//
//        $sql = 'UPDATE '.$table.' SET ';
//        $cnt = 0;
//        foreach($value as $key => $val){
//            $cnt++;
//
//            if(count($value)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.', ';
//            }
//
//        }
//
//        $sql .= ' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//
//            if(end($where)==$val){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' AND ';
//            }
//
//        }
//
//        return $sql;
//    }
//
//    // update Or 문
//    public function updateOr($table, $value, $where){
//        //$sql = 'UPDATE [테이블] SET [열]= '변경할값' WHERE [열] is null';;
//
//        $sql = 'UPDATE '.$table.' SET ';
//        $cnt = 0;
//        foreach($value as $key => $val){
//            $cnt++;
//
//            if(count($value)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.', ';
//            }
//
//        }
//
//        $sql .= ' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//
//            if(end($where)==$val){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' OR ';
//            }
//
//        }
//
//        return $sql;
//    }
//
//    // delete and 문
//    public function deleteAnd($table, $where){
//        //$sql = 'UPDATE [테이블] SET [열]= '변경할값' WHERE [열] is null';;
//
//        $sql = 'DELETE FROM '.$table.' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//
//            if(count($where)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' AND ';
//            }
//
//        }
//
//        return $sql;
//    }
//
//    // delete or 문
//    public function deleteOr($table, $where){
//        //$sql = 'UPDATE [테이블] SET [열]= '변경할값' WHERE [열] is null';;
//
//        $sql = 'DELETE FROM '.$table.' WHERE ';
//        $cnt = 0;
//        foreach($where as $key => $val){
//            $cnt++;
//            if(count($where)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.' OR ';
//            }
//        }
//
//        return $sql;
//    }
//
//    // insert 문
//    public function insert($table, $value){
//        //$sql = 'UPDATE [테이블] SET [열]= '변경할값' WHERE [열] is null';;
//
//        $sql = 'INSERT INTO '.$table.' SET ';
//        $cnt = 0;
//        foreach($value as $key => $val){
//            $cnt++;
//            if(count($value)==$cnt){
//                $sql .= $key.'='.$val;
//            }else{
//                $sql .= $key.'='.$val.', ';
//            }
//        }
//
//        return $sql;
//    }
//}
//
//
// $DB = new DB();
//
//$DB ->
//
// $value['userName'] = 'a';
// //$value['itemName'] = 'b';
// $where['key'] = 'val';
// $where['key2'] = 'val2';
//
// echo $DB->selectAnd($value, 'table', $where); echo '
// ';
//
// //echo $DB->updateAnd('table', $a, $b); echo '
// //';
// //echo $DB->deleteAnd('table', $b); echo '
// //';
// //echo $DB->selectOr($a, 'table', $b); echo '
// //';
//
// echo $DB->updateOr('table', $value, $where); echo '
// ';
// /*
// echo $DB->deleteOr('table', $b); echo '
// ';
// echo $DB->insert('table', $b); echo '
// ';
//*/
//
//
// ?>
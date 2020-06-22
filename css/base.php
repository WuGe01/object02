<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dns="mysql::host:localhost;charset=utf8;dbname=db66";
    private $table;
    private $pdo;
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dns,'root','');
    }
    public function all(...$a){
        $sql="select * from $this->table ";
        if(!empty($a[0]) && is_array($a[0])){
            $tmp=[];
            foreach ($a as $key => $value) {
                $tmp[]="`".$key."` = '".$value."'";
            }
            $sql=$sql. " where " . join(" && ",$tmp);
        }
        if(!empty($a[1])){
            $sql=$sql . $a[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function nums(...$a){
        $sql="select count(*) from $this->table ";
        if(!empty($a) && is_array($a[0])){
            $tmp=[];
            foreach ($a as $key => $value) {
                $tmp[]="`".$key."` = '".$value."'";
            }
            $sql=$sql. " where ".join(" && " ,$tmp);
        }else{
            $sql=$sql . $a[0];
        }
        if(!empty($a[1])){
            $sql=$sql . $a[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function find($a){
        $sql="select * from $this->table ";
        if(is_array($a)){
            $tmp=[];
            foreach ($a as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . join(" && ",$tmp);
        }else{
            $sql=$sql . " where `id`='$a'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($a){
        $sql="delect from $this->table ";
        if(is_array($a)){
            $tmp=[];
            foreach ($a as $key => $value) {
                $tmp="`".$key."`  =  '".$value."'";
            }
            $sql=$sql . "where " . join(" && ",$tmp);
        }else{
            $sql=$sql . "where `id`='$a'";
        }
        return $this->pdo->exec($sql);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save($a){
        if(!empty($a['id'])){
            $tmp=[];
            foreach ($a as $key => $value) {
                $tmp[]="`$key` = '$value'";
            }
            $sql="update $this->table set ".join(",",$tmp)." where `id` = '".$a['id']."'";
        }else{
            $sql="insert into $this->table (`".join("`,`",array_keys($a))."`) values('".join("','",$a)."')";
        }
        return $this->pdo->exec($sql);
    }
}
function to($u){
    header("location:".$u);
}

$total=new DB('total');
$chk=$total->find(['date'=>date("Y-m-d")]);
if(empty($_SESSION['visted']) && !empty($chk)){
    $total->save($chk=['total'=>1,'date'=>date("Y-m-d")]);

}else if(empty($_SESSION['visted']) && empty($chk)){
    $total->save($chk=['total'=>1,'date'=>date("Y-m-d")]);
   
}else if(empty($_SESSION['visted']) && !empty($chk)){
    $chk['total']++; 
    $total->save($chk);
    $_SESSION['visted']=1;
}
// (empty($chk))?$chk=['total'=>1,'date'=>date("Y-m-d")]:$chk['total']++;

?>
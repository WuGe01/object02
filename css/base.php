<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dns="mysql::host=localhost;charset=utf8;dbname=db66";
    private $table;
    private $pdo;
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dns,'root','');
    }
    public function all(...$arg){
        $sql="select * from $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            $tmp=[];
            foreach ($arg[0] as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . join(" && ",$tmp);
        }
        if(!empty($arg[1])){
            $sql=$sql . $arg[1];    
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function nums(...$arg){
        $sql="select count(*) from $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            $tmp=[];
            foreach ($arg[0] as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . join(" && ",$tmp);
        }else{
            $sql=$sql . $arg[0];
        }
        if(!empty($arg[1])){
            $sql=$sql . $arg[1];    
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function find($arg){
        $sql="select * from $this->table ";
        if(is_array($arg)){
            $tmp=[];
            foreach ($arg as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . join(" && ",$tmp);
        }else{
            $sql=$sql . " where `id`='$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($arg){
        $sql="delete  from $this->table ";
        if(is_array($arg)){
            $tmp=[];
            foreach ($arg as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where " . join(" && ",$tmp);
        }else{
            $sql=$sql . " where `id`='$arg'";
        }
        return $this->pdo->exec($sql);
    }
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function save($arg){
        if(!empty($arg['id'])){
            foreach($arg as $key => $value){
                if($key!='id'){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
            }
            $sql="update $this->table set ".join(",",$tmp)." where `id`='".$arg['id']."'";
        }else{

            $sql="insert into $this->table (`".join("`,`",array_keys($arg))."`) values('".join("','",$arg)."')";
        }
        return $this->pdo->exec($sql);
    }
}
function to($url){
    header("location:".$url);
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
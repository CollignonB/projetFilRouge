<?php 
class Transfert {
    protected int $id;
    protected float $amount;
    protected string $date_transfert;
    protected string $type;
    protected Account $account;

    public function setId(int $id){
        $this->id = $id;
    }
    public function setAmount(float $amount){
        $this->amount = $amount;
    }
    public function setDate_transfert(string $date){
        $this->date_transfert = $date;
    }
    public function setType(string $type){
        $this->type = $type;
    }

    public function getId(){
        return $this->id;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getDate_transfert(){
        return $this->date_transfert;
    }
    public function getType(){
        return $this->type;
    }

    public function createTransfert(){}
}
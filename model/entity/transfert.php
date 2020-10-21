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
    public function setAccount(array $data){
        $this->account = new Account($data);
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
    public function getAccount(){
        return $this->account;
    }

    private function hydrate(array $data){
        foreach($data as $key => $value){
            $method  = "set" . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function __construct($data){
        $this->hydrate($data);
    }
}
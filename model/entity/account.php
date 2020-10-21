<?php 

class Account {

    protected int $id;
    protected int $amount;
    protected User $user;
    protected string $date_crea;
    protected string $account_type_id;
    
    public function setAmount(int $amount){
        $this->amount = $amount;
    }

    public function setDate(string $date_crea){
        $this->date_crea = $date_crea;
    }
    public function setType (string $type) {
        $this->accountType = $type;
    }
    public function setUser($data){
        $this->user = new User($data);
    }
    public function setAccount_type_id($id){
        $this->account_type_id = $id;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function getDate() {
        return $this->date_crea;
    }
    public function getType() {
        return $this->accountType;
    }
    public function getUser(){
        return $this->user;
    }
    public function getAccount_type_id(){
        return $this->account_type_id;
    }

    // /!\ 
    private function hydrate(array $data){
        foreach($data as $key => $value){
            $method  = "set" . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }    

    public function __construct(array $data){
        $this->hydrate($data);
    }
}
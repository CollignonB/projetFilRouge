<?php 

class Account {

    protected int $id;
    protected int $amount;
    protected User $user;
    protected string $date_crea;
    protected string $accountType;
    
    public function setAmount(int $amount){
        $this->amount = $amount;
    }
    public function setUser (User $user){
        $this->user = $user;
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

    public function getAmount() {
        return $this->amount;
    }
    public function getUSer() {
        return $this->user;
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
<?php
    class Member
    {
        private $user;
        private $pass;
    

	public function getUser() {
		return $this->user;
	}
	
	public function setUser($user): self {
		$this->user = $user;
		return $this;
	}

	public function getPass() {
		return $this->pass;
	}
	
	public function setPass($pass): self {
		$this->pass = $pass;
		return $this;
	}
}
?>
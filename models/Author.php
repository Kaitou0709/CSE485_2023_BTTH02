<?php
    class Author{
        private $ma_tgia;
        private $ten_tgia;


        public function _construct($ma_tgia, $ten_tgia){
            $this->ma_tgia = $ma_tgia;
            $this->ten_tgia = $ten_tgia;
        }

        public function getIdAuthor(){
            return $this->ma_tgia;
        }
        public function getNameAuthor(){
            return $this->ten_tgia;
        }

        public function setNameAuthor($ten_gia_Moi){
            $this->ten_tgia = $ten_gia_Moi;
        }
    }
?>
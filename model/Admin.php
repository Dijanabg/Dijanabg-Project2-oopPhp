<?php

class Admin extends ApstractUser
{
    public function __construct($ime, $prezime, $email, $sifra, $telefon, $tip)
    {
        parent::__construct($ime, $prezime, $email, $sifra, $telefon, $tip);
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    public function getPrezime()
    {
        return $this->prezime;
    }

    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSifra()
    {
        return $this->sifra;
    }

    public function setSifra($sifra)
    {
        $this->sifra = $sifra;
    }

    public function getTelefon()
    {
        return $this->telefon;
    }

    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    public function getTip()
    {
        return $this->tip;
    }

    public function setTip($tip)
    {
        $this->tip = $tip;
    }
}

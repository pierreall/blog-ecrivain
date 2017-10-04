<?php
namespace App\Model\DAO;

interface DAO
{
    public function create();
    public function read();
    public function update();
    public function delete();
}
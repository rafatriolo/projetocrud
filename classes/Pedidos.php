<?php

require_once('Crud.php');
class Pedidos extends Crud
{
    protected $table = 'pedidos';
    private $nome;
    private $cliente;
    private $produto;

    public function setCliente($cliente){
        return $this->cliente = $cliente;
    }

    public function setProduto($produto){
        return $this->produto = $produto;
    }


    public function insert(){
        $sql = "INSERT INTO $this->table (id_produto , id_cliente) VALUES (:id_produto , :id_cliente)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id_produto' , $this->produto);
        $stmt->bindParam(':id_cliente' , $this->cliente);
        return $stmt->execute();

    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET nome = :nome , descricao = :descricao , preco= :preco WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome' , $this->nome);
        $stmt->bindParam(':descricao' , $this->descricao);
        $stmt->bindParam(':preco' , $this->preco);
        $stmt->bindParam(':id' , $id ,  PDO::PARAM_INT);
        return $stmt->execute();
    }
}
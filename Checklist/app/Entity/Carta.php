<?php

namespace App\Entity;

use \App\db\Database;
use \PDO;

class Carta
{

  /**
   * Identificador único da carta
   * @var integer
   */
  public $id;

  /**
   * Título da carta
   * @var string
   */
  public $titulo;

  /**
   * Descrição da carta (pode conter html)
   * @var string
   */
  public $detalhes;

  /**
   * Define se a carta está em uso
   * @var string(s/n)
   */
  public $ativo;

  /**
   * Data de publicação da carta
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar uma nova vaga no banco
   * @return boolean
   */
  public function cadastrar()
  {
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A CARTA NO BANCO
    $obDatabase = new Database('cartas');
    $this->id = $obDatabase->insert([
      'titulo'    => $this->titulo,
      'detalhes' => $this->detalhes,
      'ativo'     => $this->ativo,
      'data'      => $this->data
    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar as informações da carta no banco
   * @return boolean
   */
  public function atualizar()
  {
    return (new Database('cartas'))->update('id = ' . $this->id, [
      'titulo'    => $this->titulo,
      'detalhes' => $this->detalhes,
      'ativo'     => $this->ativo,
      'data'      => $this->data
    ]);
  }

  /**
   * Método responsável por excluir a carta do banco
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('cartas'))->delete('id = ' . $this->id);
  }

  /**
   * Método responsável por obter as cartas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getcartas($where = null, $order = null, $limit = null)
  {
    return (new Database('cartas'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * Método responsável por buscar uma cartas com base em seu ID
   * @param  integer $id
   * @return Carta
   */
  public static function getCarta($id)
  {
    return (new Database('cartas'))->select('id = ' . $id)
      ->fetchObject(self::class);
  }
}
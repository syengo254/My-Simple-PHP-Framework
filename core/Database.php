<?php

namespace Core;

class Database
{
  protected $connection;
  protected \PDOStatement|false $statement;

  public function __construct($dbconfig)
  {
    $dsn = "mysql:" . http_build_query($dbconfig, arg_separator: ";");

    $this->connection = new \PDO($dsn, options: [
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ]);
  }

  public function query(string $query, $params = null)
  {
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  }

  public function get()
  {
    return $this->statement->fetchAll();
  }

  public function find()
  {
    return $this->statement->fetch();
  }

  public function findOrFail()
  {
    $result = $this->find();

    if (!$result) {
      abort(405);
    }

    return $result;
  }

  public function __destruct()
  {
    $this->connection = null;
  }
}

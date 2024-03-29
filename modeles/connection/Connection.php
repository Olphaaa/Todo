<?php

class Connection extends PDO
{

    private $stmt;

    public function __construct(string $dsn, string $username, string $password)
    {

        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery(string $query, array $parameters = []): bool //execute la requete sur la base de données
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults(): array //permet de récupérer les valeurs de la base de données
    {
        return $this->stmt->fetchall();
    }
}

?>

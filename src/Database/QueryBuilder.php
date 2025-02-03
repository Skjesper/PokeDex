<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class QueryBuilder
{
    private string $query;
    public int $count;

    public int $number;

    public string $column;
    public string $direction;
    public string $operator;
    public int $value;

    public function __construct(
        private PDO $database
    ) {
    }

    public function select(array $columns = ['*']): static
    {
        $this->query = sprintf('SELECT %s', implode(', ', $columns));

        return $this;
    }

    public function count($column, $table): int {
    $result = $this->select(["COUNT(" . $column . ") as num"])->from($table)->first();

        return $result->num;
    }

    public function from(string $table): static
    {
        $this->query = sprintf('%s FROM %s', $this->query, $table);

        return $this;
    }
    public function limit(int $count): static {
        $this->query = sprintf('%s LIMIT %s', $this->query, $count);

        return $this;
    }

    public function orderBy($column, $direction): static{
        $this->query = sprintf('%s ORDER BY %s %s', $this->query, $column, $direction);
        return $this;
    }

    public function where($column, $operator, $value): static {
        $this->query = sprintf('%s WHERE %s %s %s', $this->query, $column, $operator, $value);
        return $this;
    }

    public function groupBy($column): static {
        $this->query = sprintf('%s GROUP BY %s', $this->query, $column);
        return $this;
    }

    public function first():object 
    {
        $result = $this->limit(1)->get();
        return reset($result);
            }


    public function get(): array
    {
        $statement = $this->database->prepare($this->query);

        $statement->execute();

        if ($result = $statement->fetchAll(PDO::FETCH_CLASS)) {
            return $result;
        }

        return [];
    }

}
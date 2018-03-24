<?php

namespace Tvswe\DatabaseBundle\Operations;

class Select implements OperationInterace
{
    private $tables;
    
    private $columns;
    
    private $joins;
    
    private $where;
    
    public function __construct()
    {
        $this->tables = [];
        $this->columns = [];
        $this->joins = [];
        $this->where = [];
    }
    
    public function addColumns(string $table, string ...$columns): void
    {
        $this->tables[] = $table;
        
        foreach ($columns as $column) {
            $this->columns[] = $table . '.' . $column;
        }
    }
    
    public function addLeftJoin(string $table, string $foreignKey, string $column): void
    {
        $this->joins[$table] = sprintf('%s ON %s.%s = %s', $table, $table, $foreignKey, $column);
    }
    
    public function addWhere(string ...$where): void
    {
        $this->where[] = '(' . implode(' OR ', $where) . ')';
    }
    
    public function getQuery() :string
    {
        $sql = ['SELECT'];
        $sql[] = implode(', ', $this->columns);
        $sql[] = 'FROM';
        $sql[] = reset($this->tables);
        
        if ($this->joins) {
            $sql[] = 'LEFT JOIN';
            $sql[] = implode(' ', $this->joins);
        }
        
        if ($this->where) {
            $sql[] = 'WHERE';
            $sql[] = implode(' AND ', $this->where);
        }
        
        return implode(' ', $sql);
    }
}
<?php

namespace Tvswe\DatabaseBundle\Operations;

interface OperationInterface
{
    public function getQuery() :string;
}
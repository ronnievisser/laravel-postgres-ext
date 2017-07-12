<?php

namespace RonnieVisser\Database;

use Illuminate\Database\PostgresConnection as BasePostgresConnection;
use RonnieVisser\Database\Schema\PostgresBuilder;
use RonnieVisser\Database\Query\Grammars\PostgresGrammar as QueryGrammar;
use RonnieVisser\Database\Schema\Grammars\PostgresGrammar as SchemaGrammar;

class PostgresConnection extends BasePostgresConnection
{
    /**
     * {@inheritdoc}
     *
     * @return PostgresBuilder
     */
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        return new PostgresBuilder($this);
    }

    /**
     * {@inheritdoc}
     *
     * @return QueryGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar);
    }

    /**
     * {@inheritdoc}
     *
     * @return SchemaGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }
}

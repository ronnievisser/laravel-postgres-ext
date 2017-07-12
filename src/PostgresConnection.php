<?php

namespace RonnieVisser\Postgres\Database;

use Illuminate\Database\PostgresConnection as BasePostgresConnection;
use RonnieVisser\Postgres\Database\Schema\PostgresBuilder;
use RonnieVisser\Postgres\Database\Query\Grammars\PostgresGrammar as QueryGrammar;
use RonnieVisser\Postgres\Database\Schema\Grammars\PostgresGrammar as SchemaGrammar;

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

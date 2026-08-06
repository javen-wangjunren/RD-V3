<?php
Class CustomManageColumns {
    
    private $typeInfo;
    private $usefulTypes;
    private $targets;

    private $addColumns;
    private $delColumns;

    public static function getInstance( $type, $targets ){
        $self = new self( $type );
        $self->targets = $targets;
        return $self;
    }

    public static function postType( ...$targets ){
        return static::getInstance( 'post_type', $targets );
    }

    public static function taxonomy( ...$targets ){
        return static::getInstance( 'taxonomy', $targets );
    }

    public function registerType( $type, $typeInfo ) {
        $this->usefulTypes[ $type ] = $typeInfo;
    }

    public function add( ...$columns ) {
        $this->addColumns = array_merge( $this->addColumns, $columns );
        return $this;
    }

    public function del( ...$columns ) {
        $this->delColumns = array_merge( $this->delColumns, $columns );
        return $this;
    }

    public function run() {
        foreach ( $this->targets as $target ) {
            $this->typeInfo['hook']( $target );
        }
    }

    private function __construct( $type ) {
        $this->initUsefulTypes();

        if ( $this->isAllow( $type ) ) {
            $this->typeInfo = $this->usefulTypes[ $type ];
            $this->addColumns = [];
            $this->delColumns = [];
        }
    }

    private function initUsefulTypes() {
        $this->registerType( 'post_type', [
            'hook' => function( $target ) {
                add_action( "manage_{$target}_posts_columns", [ $this, 'getColumnsList' ] );
                add_action( "manage_{$target}_posts_custom_column", [ $this, 'getColumnsValue' ], 10, 2 );
            },
            'columnOrder' => 0
        ] );

        $this->registerType( 'taxonomy', [
            'hook' => function( $target ) {
                add_filter( "manage_edit-{$target}_columns", [ $this, 'getColumnsList' ] );
                add_filter( "manage_{$target}_custom_column", [ $this, 'getColumnsValue' ], 10, 3 );
            },
            'columnOrder' => 1
        ] );
    }

    private function isAllow( $type ) {
        if ( !array_key_exists( $type, $this->usefulTypes ) ) {
            throw new Exception( "$type is useless type!" );
        }
        return true;
    }

    public function getColumnsList( $columns ) {
        $columnsKey = array_keys( $columns );

        foreach ( $this->addColumns as $column ) {
            if ( isset( $column['order'] ) ) {
                array_splice( $columnsKey, $column['order'], 0, $column['title'] );
            } else {
                array_push( $columnsKey, $column['title'] );
            }
        }

        $newColumns = [];

        foreach ( $columnsKey as $key ) {
            if ( in_array( $key, $this->delColumns ) ) continue;
            $newColumns[$key] = !empty( $columns[ $key ] ) ? $columns[ $key ] : $key;
        }
        
        return $newColumns;
    }

    public function getColumnsValue( ...$args ) {
        $column = $args[ $this->typeInfo['columnOrder'] ];

        foreach ( $this->addColumns as $addColumn ) {
            if ( $column === $addColumn['title'] ) {
                echo $addColumn['get'](  ...$args  );
            }
        }
    }
}
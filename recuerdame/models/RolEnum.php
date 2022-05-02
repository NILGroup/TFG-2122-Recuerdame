<?php

enum RolEnum {

    case TERAPEUTA;
    case CUIDADOR;

    public static function fromRol(string $rol): RolEnum
    {
        foreach (self::cases() as $roles) {
            if( $rol === $roles->name ){
                return $roles;
            }
        }
    }
}


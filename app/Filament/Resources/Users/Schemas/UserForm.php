<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            
            TextInput::make('name')
                ->required(),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Toggle::make('is_admin')
                ->label('Admin'),

            TextInput::make('password')
                ->password()
                ->confirmed()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (string $context): bool => $context === 'create'),

            TextInput::make('password_confirmation')
                ->password()
                ->required(fn (string $context): bool => $context === 'create')
                ->dehydrated(false),
        ]);
    }
}

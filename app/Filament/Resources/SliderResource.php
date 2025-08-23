<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('type')
                ->required()
                ->placeholder('homepage, aboutpage, footer, etc.')
                ->maxLength(255),

            Forms\Components\Repeater::make('slides')
                ->label('Slides')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->directory('slides')
                        ->disk('public')
                        ->required(),

                    Forms\Components\TextInput::make('title')
                        ->maxLength(255)
                        ->nullable(), // title optional

                    Forms\Components\Textarea::make('description')
                        ->rows(2)
                        ->nullable(), // description optional

                    Forms\Components\TextInput::make('link')
                        ->label('Redirect URL')
                        ->url() // validate as URL
                        ->placeholder('https://example.com')
                        ->nullable(), // link optional
                ])
                ->collapsible()
                ->minItems(1)
                ->columns(1)
                ->createItemButtonLabel('Add Slide'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M d, Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }    
}

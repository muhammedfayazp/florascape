<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstimateRequestResource\Pages;
use App\Filament\Resources\EstimateRequestResource\RelationManagers;
use App\Models\EstimateRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EstimateRequestResource extends Resource
{
    protected static ?string $model = EstimateRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';
    protected static ?string $navigationGroup = 'Leads';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make('Customer Information')
                            ->schema([
                                Forms\Components\TextInput::make('user_name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('user_email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('user_phone')
                                    ->label('Phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(191),
                            ])->columnSpan(1),

                        Forms\Components\Section::make('Project Details')
                            ->schema([
                                Forms\Components\TextInput::make('property_type')
                                    ->required()
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('square_feet')
                                    ->label('Area (Sq. Ft.)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TagsInput::make('services')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columnSpan(1),

                        Forms\Components\Section::make('Status & Notes')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'new' => 'New',
                                        'contacted' => 'Contacted',
                                        'quoted' => 'Quoted',
                                        'completed' => 'Completed',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->default('new'),
                                Forms\Components\Textarea::make('admin_notes')
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])->columnSpan(1),

                        Forms\Components\Section::make('Estimate Summary')
                            ->schema([
                                Forms\Components\TextInput::make('estimate_min')
                                    ->label('Min (AED)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('estimate_max')
                                    ->label('Max (AED)')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('estimate_average')
                                    ->label('Average (AED)')
                                    ->required()
                                    ->numeric(),
                            ])->columns(3)->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('property_type')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('square_feet')
                    ->label('Area (Sq. Ft.)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estimate_average')
                    ->label('Avg. Estimate')
                    ->money('AED')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'primary',
                        'contacted' => 'warning',
                        'quoted' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListEstimateRequests::route('/'),
            'create' => Pages\CreateEstimateRequest::route('/create'),
            'view' => Pages\ViewEstimateRequest::route('/{record}'),
            'edit' => Pages\EditEstimateRequest::route('/{record}/edit'),
        ];
    }
}

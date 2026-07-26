<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $casts = [
        'used_luck_values' => 'array',
        'base_stats'       => 'array',
    ];

    protected $attributes = [
        'used_luck_values' => '[]',
        'base_stats'       => '{"strength":0,"dexterity":0,"charm":0,"mind_power":0}',
    ];

    const CHARACTER_STATIC_ID = 1;

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Character->value;
    }

    public function weapon(): BelongsTo
    {
        return $this->belongsTo(Weapon::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, TableNameEnum::CharacterItem->value);
    }

    /**
     * Проверка, было ли значение удачи использовано
     */
    public function isLuckValueUsed(int $value): bool
    {
        return in_array($value, $this->used_luck_values, true);
    }

    /**
     * Добавить значение удачи
     */
    public function addLuckValue(int $value): void
    {
        $used = $this->used_luck_values;
        if (!in_array($value, $used, true)) {
            $used[] = $value;
            $this->used_luck_values = $used;
        }
    }

    /**
     * Получить текущие предметы
     */
    public function getInventory(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->items()->get();
    }

    /**
     * Добавить предмет
     */
    public function addItem(Item $item, int $quantity = 1): void
    {
        $this->items()->syncWithoutDetaching([
            $item->id => ['quantity' => $quantity]
        ]);
    }

    /**
     * Проверить, есть ли у персонажа предмет
     */
    public function hasItem(int $itemId): bool
    {
        return $this->items()->where('item_id', $itemId)->exists();
    }
}

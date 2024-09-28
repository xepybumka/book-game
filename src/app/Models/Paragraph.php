<?php

namespace App\Models;

use App\Enums\TableNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'number',
        'text',
        'created_at',
        'updated_at',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->table = TableNameEnum::Paragraph->value;
    }
}

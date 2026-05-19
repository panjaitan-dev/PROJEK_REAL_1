<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $table = 'home_settings';

    protected $fillable = ['key', 'value'];

    // ─── Static Helpers ───────────────────────────────────────────────────────

    /**
     * Ambil nilai setting berdasarkan key.
     * Jika tidak ada, kembalikan $default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $row = static::where('key', $key)->first();
        return $row ? $row->value : $default;
    }

    /**
     * Simpan / perbarui nilai setting.
     */
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    /**
     * Ambil semua setting sebagai array asosiatif key => value.
     */
    public static function allAsArray(): array
    {
        return static::all()->pluck('value', 'key')->toArray();
    }
}

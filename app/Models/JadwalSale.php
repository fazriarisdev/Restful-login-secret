<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class JadwalSale extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'jadwal_sales';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PRESALES_REQUIREMENT_SELECT = [
        'Adnan'  => 'Adnan',
        'Cahya'  => 'Cahya',
        'Faizal' => 'Faizal',
        'Fazri'  => 'Fazri',
    ];

    protected $fillable = [
        'name_partner',
        'name_end_user',
        'date',
        'time',
        'agenda',
        'province',
        'address',
        'meeting_result',
        'presales_requirement',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PROVINCE_SELECT = [
        'Aceh'                      => 'Aceh',
        'Bali'                      => 'Bali',
        'Banten'                    => 'Banten',
        'Bengkulu'                  => 'Bengkulu',
        'Gorontalo'                 => 'Gorontalo',
        'Jakarta'                   => 'Jakarta',
        'Jambi'                     => 'Jambi',
        'Jawa Barat'                => 'Jawa Barat',
        'Jawa Tengah'               => 'Jawa Tengah',
        'Jawa Timur'                => 'Jawa Timur',
        'Kalimantan Barat'          => 'Kalimantan Barat',
        'Kalimantan Selatan'        => 'Kalimantan Selatan',
        'Kalimantan Tengah'         => 'Kalimantan Tengah',
        'Kalimantan Timur'          => 'Kalimantan Timur',
        'Kalimantan Utara'          => 'Kalimantan Utara',
        'Kepulauan Bangka Belitung' => 'Kepulauan Bangka Belitung',
        'Kepulauan Riau'            => 'Kepulauan Riau',
        'Lampung'                   => 'Lampung',
        'Maluku'                    => 'Maluku',
        'Maluku Utara'              => 'Maluku Utara',
        'Nusa Tenggara Barat'       => 'Nusa Tenggara Barat',
        'Nusa Tenggara Timur'       => 'Nusa Tenggara Timur',
        'Papua'                     => 'Papua',
        'Papua Barat'               => 'Papua Barat',
        'Riau'                      => 'Riau',
        'Sulawesi Barat'            => 'Sulawesi Barat',
        'Sulawesi Selatan'          => 'Sulawesi Selatan',
        'Sulawesi Tengah'           => 'Sulawesi Tengah',
        'Sulawesi Tenggara'         => 'Sulawesi Tenggara',
        'Sulawesi Utara'            => 'Sulawesi Utara',
        'Sumatra Barat'             => 'Sumatra Barat',
        'Sumatra Selatan'           => 'Sumatra Selatan',
        'Sumatra Utara'             => 'Sumatra Utara',
        'Yogyakarta'                => 'Yogyakarta',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

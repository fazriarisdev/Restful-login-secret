<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class War extends Model
{
    use SoftDeletes;

    public $table = 'wars';

    protected $dates = [
        'timeline',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Followers' => 'Followers',
        'Create'    => 'Create',
    ];

    const ACCOUNT_TYPE_SELECT = [
        'System Integrator' => 'System Integrator',
        'Consultant'        => 'Consultant',
        'End User'          => 'End User',
    ];

    const SALES_SELECT = [
        'Billy'  => 'Billy',
        'Fitria' => 'Fitria',
        'Helena' => 'Helena',
        'Rey'    => 'Rey',
        'Yanie'  => 'Yanie',
    ];

    const PROJECT_SEGMENT_SELECT = [
        'Government' => 'Government',
        'Building'   => 'Building',
        'Military'   => 'Military',
        'Industry'   => 'Industry',
        'Critical'   => 'Critical',
        'Warehouse'  => 'Warehouse',
    ];

    protected $fillable = [
        'sales',
        'project_name',
        'city',
        'project_segment',
        'status',
        'model',
        'value_project',
        'timeline',
        'account_type',
        'company_name_partner',
        'pic_name',
        'update',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTimelineAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTimelineAttribute($value)
    {
        $this->attributes['timeline'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

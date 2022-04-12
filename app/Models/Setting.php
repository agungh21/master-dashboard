<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['setting_name', 'setting_value'];

    private static function createSetting($settingName, $settingValue = null)
    {
        return Setting::create([
            'setting_name'  => $settingName,
            'setting_value' => $settingValue
        ]);
    }

    public static function getSettingByName($settingName, $settingValue = null)
    {
        $setting = Setting::where('setting_name', $settingName)->first();

        if (empty($setting)) {
            $setting = self::createSetting($settingName, $settingValue);
        }

        return $setting;
    }

    public static function updateSettings(array $settings)
    {
        foreach ($settings as $key => $value) {
            self::updateSetting($key, $value);
        }
    }

    public static function updateSetting($key, $value)
    {
        return Setting::where('setting_name', $key)
            ->update(['setting_value' => $value]);
    }

    /**
     * @param $settingValue default value if setting doesnt exist
     * @return setting value
     */
    public static function getSettingValue($settingName, $settingValue = null)
    {
        $setting = self::getSettingByName($settingName, $settingValue);

        return $setting->setting_value;
    }

    /**
     * get Name Application
     */
    public static function getUmum(): array
    {
        $data = [
            'name_app' => 'MY APP',
            'creator_app' => 'PT. Adiva Sumber Solusi.',
        ];

        $setting = self::getSettingValue('umum', serialize($data));
        return unserialize($setting);
    }

    public static function getSettingCommon(): array
    {
        return [
            'umum' => self::getUmum(),
        ];
    }

    public static function commonStore(array $request)
    {
        // Update Umum
        $umum = $request['umum'];
        self::updateSetting('umum', serialize($umum));
    }
}

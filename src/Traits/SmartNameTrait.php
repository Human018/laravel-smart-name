<?php

namespace Human018\SmartName\Traits;

use Illuminate\Support\Str;

trait SmartNameTrait
{

    /**
     * Intuitively set the first name and last name values based on provided full name.
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
        // If our value contains an @ then we're likely being passed an email address, so we process it as such
        if(Str::contains($value, '@') && filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $name = explode("@", $value);
            $this->first_name = array_shift($name);
        }

        // Otherwise, we process the provided name as usual
        else {
            $name = explode(" ", $value);
            if ($name[0] && in_array($name[0], ['Mr', 'Mrs', 'Miss', 'Sir'])) {
                $this->title = array_shift($name);
            }
            $this->first_name = $name[0] ? array_shift($name) : '';
            $name = implode(" ", $name);
            $this->last_name = $name ? $name : '';
        }
    }

    /**
     * Return the full name string of this resource.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return trim(str_replace("  "," ",$this->title." ".$this->first_name." ".$this->last_name));
    }

}
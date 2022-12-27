<?php
namespace App\Helpers;

trait Translation {
    public function getTranslate ($name) {
        $locale = \Illuminate\Support\Facades\App::getLocale();
        return $locale == 'en' ? $this[$name] : ($this[$name . '_' . $locale] ? $this[$name . '_' . $locale] : $this[$name]);
    }
}
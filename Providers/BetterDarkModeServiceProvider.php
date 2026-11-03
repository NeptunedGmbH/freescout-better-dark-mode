<?php

namespace Modules\BetterDarkMode\Providers;

use Illuminate\Support\ServiceProvider;

class BetterDarkModeServiceProvider extends ServiceProvider
{
    /**
     * Official module alias. The license key itself is never read.
     */
    const OFFICIAL_ALIAS = 'darkmode';

    public function register()
    {
        $this->commands([
            \Modules\BetterDarkMode\Console\HealthCommand::class,
        ]);
    }

    public function boot()
    {
        \Eventy::addFilter('stylesheets', function ($styles) {
            if (!self::officialReady()) {
                return $styles;
            }
            $styles[] = \Module::getPublicPath('betterdarkmode').'/css/module.css';

            return $styles;
        }, 30, 1);
    }

    /**
     * The official module must be switched on, and FreeScout must have marked
     * its license as activated. That flag is set when a license key is accepted.
     * This does not call the FreeScout license server and does not look at the key.
     *
     * @return bool
     */
    public static function officialReady()
    {
        try {
            if (!\App\Module::isActive(self::OFFICIAL_ALIAS)) {
                return false;
            }
            $module = \App\Module::getByAlias(self::OFFICIAL_ALIAS);
        } catch (\Exception $e) {
            return false;
        }

        return $module && !empty($module->activated);
    }
}

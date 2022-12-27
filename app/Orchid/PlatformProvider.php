<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Home')
            ->icon('home')
            ->list([
                Menu::make('My contacts')->icon('phone')->route('platform.contacts'),
                Menu::make('Skills')->icon('energy')->route('platform.skills'),
                Menu::make('About me')->icon('book-open')->route('platform.about-me'),
            ]),
            Menu::make('Users')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title('Access rights'),

            Menu::make('Translations')
                ->icon('globe')
                ->url('/translations')
                ->title('Settings'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group('System')
                ->addPermission('platform.systems.roles', 'Roles')
                ->addPermission('platform.systems.users', 'Users'),
        ];
    }
}

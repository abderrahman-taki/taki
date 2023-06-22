<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "parent_id" => 0,
                    "order" => 17,
                    "title" => "Dashboard",
                    "icon" => "fa-bar-chart",
                    "uri" => "/",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 18,
                    "title" => "Admin",
                    "icon" => "fa-tasks",
                    "uri" => "",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 19,
                    "title" => "Users",
                    "icon" => "fa-users",
                    "uri" => "auth/users",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 20,
                    "title" => "Roles",
                    "icon" => "fa-user",
                    "uri" => "auth/roles",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 21,
                    "title" => "Permission",
                    "icon" => "fa-ban",
                    "uri" => "auth/permissions",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 22,
                    "title" => "Menu",
                    "icon" => "fa-bars",
                    "uri" => "auth/menu",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 23,
                    "title" => "Operation log",
                    "icon" => "fa-history",
                    "uri" => "auth/logs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 24,
                    "title" => "Settings",
                    "icon" => "fa-gears",
                    "uri" => NULL,
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "Meal Orders",
                    "icon" => "fa-bookmark",
                    "uri" => "/orders",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 2,
                    "title" => "Cart",
                    "icon" => "fa-shopping-cart",
                    "uri" => "/carts",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 3,
                    "title" => "Cart Orders",
                    "icon" => "fa-bookmark-o",
                    "uri" => "/orders-carts",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 4,
                    "title" => "Customize",
                    "icon" => "fa-envira",
                    "uri" => "/customizes",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 5,
                    "title" => "Pack",
                    "icon" => "fa-shopping-basket",
                    "uri" => "/packs",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 6,
                    "title" => "Pack Order",
                    "icon" => "fa-shopping-basket",
                    "uri" => "/pack-orders",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 8,
                    "title" => "Food",
                    "icon" => "fa-spoon",
                    "uri" => "/food",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 9,
                    "title" => "Ingredient",
                    "icon" => "fa-location-arrow",
                    "uri" => "/ingredients",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 10,
                    "title" => "Food Ingredients",
                    "icon" => "fa-location-arrow",
                    "uri" => "/food-ingredients",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 11,
                    "title" => "Pack Days",
                    "icon" => "fa-calendar-check-o",
                    "uri" => "/days",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 12,
                    "title" => "Pack Breakfast",
                    "icon" => "fa-calendar-check-o",
                    "uri" => "/breakfasts",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 13,
                    "title" => "Pack Lunch",
                    "icon" => "fa-calendar-check-o",
                    "uri" => "/lunches",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 14,
                    "title" => "Pack Dinner",
                    "icon" => "fa-calendar-check-o",
                    "uri" => "/dinners",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 15,
                    "title" => "Food Category",
                    "icon" => "fa-object-ungroup",
                    "uri" => "/categories",
                    "permission" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 16,
                    "title" => "Client",
                    "icon" => "fa-user",
                    "uri" => "/clients",
                    "permission" => NULL
                ],
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "name" => "All permission",
                    "slug" => "*",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "name" => "Dashboard",
                    "slug" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/"
                ],
                [
                    "name" => "Login",
                    "slug" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "name" => "User setting",
                    "slug" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting"
                ],
                [
                    "name" => "Auth management",
                    "slug" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "name" => "Administrator",
                    "slug" => "administrator"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "role_id" => 1,
                    "menu_id" => 2
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "role_id" => 1,
                    "permission_id" => 1
                ]
            ]
        );

        // finish
    }
}

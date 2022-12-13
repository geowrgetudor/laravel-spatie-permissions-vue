# Use Laravel Spatie Permission in Vue3

This package is fork of the original package (ahmedsaoud31/laravel-permission-to-vuejs) and requires [laravel-permission](https://github.com/spatie/laravel-permission) by Spatie.

It supports SSR.

## Installation

```bash
composer require geowrgetudor/laravel-spatie-permissions-vue
```

## Setup

Add the trait to your `User` model:

```php
use SpatiePermissionVue\Traits\RolesPermissionsToVue;

class User extends Authenticatable
{
    // ...
    use RolesPermissionsToVue;
}
```

Import and use `laravel-spatie-permissions-vue` plugin into your `app.js` file:

```js
import RolesPermissionsToVue from "../../vendor/geowrgetudor/laravel-spatie-permissions-vue/src/js";

// ...

app.use(RolesPermissionsToVue);
```

Pass the Spatie roles & permissions to a global var called `vueSpatiePermissions` in your `app.blade.php` or whatever your main blade template is called:

```html
<script type="text/javascript">
  window.vueSpatiePermissions = {!! auth()->check() ? auth()->user()->getRolesPermissionsAsJson() : 0 !!}
</script>
```

## Usage

You can make use of `can` and `is` global functions to check for permissions and roles of the current user.

```html
<div v-if="can('edit post')">
  <!-- Edit post form -->
</div>

<div v-if="is('super-admin')">
  <!-- Show admin tools -->
</div>

<!-- you can use OR operator -->
<div v-if="can('edit post | delete post | publish post')">
  <!-- Do something -->
</div>

<div v-if="is('editor | tester | user')">
  <!-- Do something -->
</div>

<!-- you can use AND operator -->
<div v-if="can('edit post & delete post & publish post')">
  <!-- Do something -->
</div>

<div v-if="is('editor & tester & user')">
  <!-- Do something -->
</div>
```

## License

The MIT License (MIT).

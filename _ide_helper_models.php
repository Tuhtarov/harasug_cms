<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AboutCard
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $excerpt
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adfm\File[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard newQuery()
 * @method static \Illuminate\Database\Query\Builder|AboutCard onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AboutCard withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AboutCard withoutTrashed()
 */
	class AboutCard extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * App\Models\Adfm\Block
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adfm\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Wtolk\Eloquent\Builder|Block filter($filter)
 * @method static \Wtolk\Eloquent\Builder|Block newModelQuery()
 * @method static \Wtolk\Eloquent\Builder|Block newQuery()
 * @method static \Illuminate\Database\Query\Builder|Block onlyTrashed()
 * @method static \Wtolk\Eloquent\Builder|Block query()
 * @method static \Wtolk\Eloquent\Builder|Block whereContent($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereCreatedAt($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereDeletedAt($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereId($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereSlug($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereTitle($value)
 * @method static \Wtolk\Eloquent\Builder|Block whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Block withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Block withoutTrashed()
 */
	class Block extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * App\Models\Adfm\FeedbackMessage
 *
 * @property int $id
 * @property array|null $fields
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\Adfm\FeedbackMessageFactory factory(...$parameters)
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage filter($filter)
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage newModelQuery()
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage newQuery()
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage query()
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage whereCreatedAt($value)
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage whereFields($value)
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage whereId($value)
 * @method static \Wtolk\Eloquent\Builder|FeedbackMessage whereUpdatedAt($value)
 */
	class FeedbackMessage extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * Wtolk\Adfm\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $original_name
 * @property string $mime
 * @property string|null $extension
 * @property int $size
 * @property int $sort
 * @property string $path
 * @property string|null $description
 * @property string|null $alt
 * @property string|null $hash
 * @property string $disk
 * @property string|null $model_name
 * @property int|null $model_id
 * @property string|null $model_relation
 * @property int|null $user_id
 * @property string|null $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $fileable_type
 * @property int|null $fileable_id
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $fileable
 * @property-read mixed $filename
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * Wtolk\Adfm\Models\Menu
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Wtolk\Adfm\Models\MenuItem[] $links
 * @property-read int|null $links_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Query\Builder|Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Menu withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Menu withoutTrashed()
 * @mixin \Eloquent
 * @method static \Database\Factories\Adfm\MenuFactory factory(...$parameters)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * Wtolk\Adfm\Models\MenuItem
 *
 * @property int $id
 * @property string $title
 * @property int $menu_id
 * @property int $parent_id
 * @property int $is_published
 * @property int $position
 * @property string|null $link
 * @property string|null $model_name
 * @property int|null $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|MenuItem[] $children_recursive
 * @property-read int|null $children_recursive_count
 * @property-read \Wtolk\Adfm\Models\File|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|MenuItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MenuItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MenuItem withoutTrashed()
 * @mixin \Eloquent
 * @property-read mixed $slug
 * @property-read \App\Models\Adfm\Menu $menu
 * @method static \Database\Factories\Adfm\MenuItemFactory factory(...$parameters)
 * @method static \Wtolk\Eloquent\Builder|MenuItem filter($filter)
 */
	class MenuItem extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * Wtolk\Adfm\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property array|null $options
 * @property array|null $meta
 * @property int $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Wtolk\Adfm\Models\File|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Query\Builder|News onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|News withTrashed()
 * @method static \Illuminate\Database\Query\Builder|News withoutTrashed()
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon $published_at
 * @property-read mixed $url
 * @method static \Wtolk\Eloquent\Builder|News filter($filter)
 * @method static \Wtolk\Eloquent\Builder|News wherePublishedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * Wtolk\Adfm\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property array|null $options
 * @property array|null $meta
 * @property int $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Wtolk\Adfm\Models\File|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Query\Builder|Page onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Page withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adfm\File[] $files
 * @property-read int|null $files_count
 * @method static \Database\Factories\Adfm\PageFactory factory(...$parameters)
 * @method static \Wtolk\Eloquent\Builder|Page filter($filter)
 */
	class Page extends \Eloquent implements \App\Models\Adfm\ILinkMenu {}
}

namespace App\Models\Adfm{
/**
 * App\Models\Adfm\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Wtolk\Eloquent\Builder|Role filter($filter)
 * @method static \Wtolk\Eloquent\Builder|Role newModelQuery()
 * @method static \Wtolk\Eloquent\Builder|Role newQuery()
 * @method static \Wtolk\Eloquent\Builder|Role permission($permissions)
 * @method static \Wtolk\Eloquent\Builder|Role query()
 * @method static \Wtolk\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Wtolk\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Wtolk\Eloquent\Builder|Role whereId($value)
 * @method static \Wtolk\Eloquent\Builder|Role whereName($value)
 * @method static \Wtolk\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Adfm{
/**
 * App\Models\Adfm\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\Adfm\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CafeCategory
 *
 * @property int $id
 * @property string $name
 * @property int $cafe_type_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CafeRecord[] $cafe_record
 * @property-read int|null $cafe_record_count
 * @property-read \App\Models\CafeType $cafe_type
 * @property-read \App\Models\Adfm\File|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|CafeCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory whereCafeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|CafeCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CafeCategory withoutTrashed()
 */
	class CafeCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CafeRecord
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $weight
 * @property int|null $price
 * @property int $cafe_category_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CafeCategory $cafe_category
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord newQuery()
 * @method static \Illuminate\Database\Query\Builder|CafeRecord onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereCafeCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeRecord whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|CafeRecord withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CafeRecord withoutTrashed()
 */
	class CafeRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CafeType
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $message
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CafeCategory[] $cafe_category
 * @property-read int|null $cafe_category_count
 * @property-read \App\Models\Adfm\File|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType newQuery()
 * @method static \Illuminate\Database\Query\Builder|CafeType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CafeType whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|CafeType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CafeType withoutTrashed()
 */
	class CafeType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chill
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int|null $price
 * @property string|null $price_info
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $url
 * @property-read \App\Models\Adfm\File|null $image
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-write mixed $published_at
 * @method static \Wtolk\Eloquent\Builder|Chill filter($filter)
 * @method static \Wtolk\Eloquent\Builder|Chill newModelQuery()
 * @method static \Wtolk\Eloquent\Builder|Chill newQuery()
 * @method static \Illuminate\Database\Query\Builder|Chill onlyTrashed()
 * @method static \Wtolk\Eloquent\Builder|Chill query()
 * @method static \Wtolk\Eloquent\Builder|Chill whereContent($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereCreatedAt($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereDeletedAt($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereId($value)
 * @method static \Wtolk\Eloquent\Builder|Chill wherePrice($value)
 * @method static \Wtolk\Eloquent\Builder|Chill wherePriceInfo($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereSlug($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereTitle($value)
 * @method static \Wtolk\Eloquent\Builder|Chill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Chill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Chill withoutTrashed()
 */
	class Chill extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $username
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $phone_id
 * @property int $email_id
 * @property-read \App\Models\Email $email
 * @property-read mixed $is_published
 * @property-read \App\Models\Phone $phone
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePhoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Comment withoutTrashed()
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Email
 *
 * @property int $id
 * @property string $email
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Comment|null $comment
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Query\Builder|Email onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|Email withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Email withoutTrashed()
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Query\Builder|Gallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Gallery withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Gallery withoutTrashed()
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Home
 *
 * @property int $id
 * @property string $title
 * @property string $title_full
 * @property string $slug
 * @property string|null $type
 * @property string|null $description
 * @property int $max_peoples
 * @property string|null $status
 * @property int|null $price
 * @property string|null $price_info
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Adfm\File[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Home newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Home newQuery()
 * @method static \Illuminate\Database\Query\Builder|Home onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Home query()
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereMaxPeoples($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home wherePriceInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereTitleFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Home withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Home withoutTrashed()
 */
	class Home extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Query\Builder|Message onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Message withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Message withoutTrashed()
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Phone
 *
 * @property int $id
 * @property string $phone
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Comment|null $comment
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone newQuery()
 * @method static \Illuminate\Database\Query\Builder|Phone onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phone whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|Phone withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Phone withoutTrashed()
 */
	class Phone extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuestionAnswer
 *
 * @property int $id
 * @property string $question
 * @property string|null $answer
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer newQuery()
 * @method static \Illuminate\Database\Query\Builder|QuestionAnswer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionAnswer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|QuestionAnswer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|QuestionAnswer withoutTrashed()
 */
	class QuestionAnswer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string $time_in
 * @property string $time_out
 * @property int|null $qty_child
 * @property int $qty_old
 * @property int|null $home_id
 * @property string $name
 * @property string $phone
 * @property int $is_confirmed
 * @property string $created_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Home|null $home
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Query\Builder|Reservation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereHomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereIsConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereQtyChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereQtyOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereTimeIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereTimeOut($value)
 * @method static \Illuminate\Database\Query\Builder|Reservation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Reservation withoutTrashed()
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}


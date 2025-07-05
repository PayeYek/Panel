<?php
namespace App\Trait;

use Illuminate\Support\Str;

trait Slugable
{
    // Array of possible fields to generate the slug from
    protected static $slugSources = ['title', 'name', 'other_field'];

    public function setSlugAttribute($value)
    {
        if (empty($value) || $value !== ($this->attributes['slug'] ?? null)) {
            // Find the first non-empty source field
            $sourceValue = $this->findSourceValue();
            if (!$sourceValue) {
                throw new \Exception('No source field found for slug generation.');
            }

            $slug = Str::slug(empty($value) ? $sourceValue : $value);
            $originalSlug = $slug;
            $counter = 1;

            // Check for uniqueness and increment counter if necessary
            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            // Set the unique slug to the attributes
            $this->attributes['slug'] = $slug;
        } else {
            // If the value has not changed, keep it as it is
            $this->attributes['slug'] = $value;
        }
    }

    protected function findSourceValue()
    {
        foreach (self::$slugSources as $field) {
            if (!empty($this->{$field})) {
                return $this->{$field};
            }
        }
        return null;
    }
}

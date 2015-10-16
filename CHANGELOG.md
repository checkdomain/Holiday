# 1.x to 2.x

- `$iso` is now required. As a result, the order of method arguments has changed.

```php
\Checkdomain\Holiday\Util::isHoliday($iso, $date = 'now', $state = null);
\Checkdomain\Holiday\Util::getHoliday($iso, $date = 'now', $state = null);
```

instead of

```php
\Checkdomain\Holiday\Util::isHoliday($date = 'now', $iso = null, $state = null);
\Checkdomain\Holiday\Util::getHoliday($date = 'now', $iso = null, $state = null);
```

# Preconditions

Preconditions are ment to be an alternative way to ensure that a precondition for a specific method is given.

## Available checks

- checkArgument()
- checkArgNotNull()

## Additional exceptions

- NullPointerException

## Example

Instead of writing
```
    if ($count <= 0) {
        throw new \InvalidArgumentException("must be positive: " . $count);
    }
```

you could use a precondition like
```
    \MehrAlsNix\Preconditions\PreconditionUtil::checkArgument($count <= 0, 'must be positive: %s', $count);
```
 
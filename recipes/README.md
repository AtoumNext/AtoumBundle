# Symfony Flex recipes

Flex recipes for `atoum-next/atoum-bundle`.

## Layout

```
recipes/atoum-next/atoum-bundle/<version>/
├── manifest.json                     # bundle registration, files to copy, gitignore, post-install output
├── .atoum.php                        # copied to the project root
└── config/packages/test/atoum.yaml   # copied to %CONFIG_DIR%/packages/test/
```

Flex applies the folder with the highest `<version>` that is `<= ` the installed
package version. `5.0/` is the active recipe for the `atoum-next/atoum-bundle`
`5.x` line; `2.0/` and `3.0/` are kept for reference from the former
`atoum/atoum-bundle` package.

## Testing a recipe locally

```bash
./recipes/test-recipe.sh 5.0
```

This scaffolds a throwaway Symfony project, wires this directory as a local Flex
endpoint (`extra.symfony.endpoint = file://.../recipes`), installs
`atoum-next/atoum-bundle:@dev` and asserts the recipe was applied.

## Publishing

The canonical location is
[`symfony/recipes-contrib`](https://github.com/symfony/recipes-contrib): open a PR
adding `atoum-next/atoum-bundle/5.0/` there (contents identical to this folder).
`extra.symfony.allow-contrib` is already set to `true` in `composer.json`, so the
recipe is picked up once merged.

Until it is merged, consumers can opt in with a private endpoint:

```bash
composer config extra.symfony.endpoint '["https://api.github.com/repos/AtoumNext/AtoumBundle/contents/recipes", "flex://defaults"]' --json
```

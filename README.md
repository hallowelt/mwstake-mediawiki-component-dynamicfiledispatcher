# DynamicFileDispatcher component
Provides dynamic images from registered modeules.

## Compatibility
- `1.0.x` -> MediaWiki 1.43

# Usage

Require this component in the `composer.json` of your extension:

```json
{
	"require": {
		"mwstake/mediawiki-component-dynamicfiledispatcher": "~1"
	}
}
```

## Getting URL

```php
/** @var DynamicFileDispatcherFactory $dynamicFileFactory */
$dynamicFileFactory = MediaWikiServices::getInstance()->getService(
    'MWStake.DynamicFileDispatcher.Factory'
);
// getUrl( string $moduleName, array $params )
$src = $dynamicFileFactory->getUrl( 'userprofileimage', $userImageParams );
```

## Registering modules

Create a class implementing `MWStake\MediaWiki\Component\DynamicFileDispatcher\IDynamicFileModule` interface.

Register:
- using Global var
- using hook

```php

// Using global var - OF spec
$mwsgMWStakeDynamicFileDispatcherModules['myModule'] = [
    'class' => 'MyModuleClass',
    'services' => [
       'A', 'B'
    ],
];

// Using hook
$wgHooks['MWStakeDynamicFileDispatcherRegisterModule'][] = function( &$modules ) {
    $modules['myModule'] = new MyModule();
};

```



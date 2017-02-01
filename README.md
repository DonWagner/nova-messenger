# Nova Messageboard

## Messageboard for Nova Framework 4.0!

Copy folder into the module folder.
Run 
```
php forge module:optimize in command line
```

Insert these two lines in the user model
```
use Modules\Messenger\Traits\UseMessengerTrait;
```
and use in top of the class:
```
Use UseMessengerTrait;
```


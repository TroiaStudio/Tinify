# Api key
API key získáte na [tinyPNG - developer API](https://tinypng.com/developers)

# Usage

```php
use TroiaStudio\Tinify\Tinify;
$tinify = new Tinify('my-secret-api-key');

$tinify->optimize(__DIR__ . '/original_image.png')->toFile(__DIR__ . '/optimized_image.png');
```


### Resize
```php
$tinify->optimize(__DIR__ . '/original_image.png')->toFile(__DIR__ . '/optimized_image.png')
        ->fit(100, 100)->toFile(__DIR__ . '/optimized_image_100x100.png')
        ->scale(null, 100)->toFile(__DIR__ . '/optimized_image_scaled_1_x100.png')
        ->scale(100, null)->toFile(__DIR__ . '/optimized_image_scaled_2_100x.png')
        ->cover(60, 100)->toFile(__DIR__ . '/optimized_image_cover_60x100.png')
        ->thumb(50, 50)->toFile(__DIR__ . '/optimized_image_thumb_50x50.png');
```

### Nette Extension

```neon
extensions: 
    tinify: TroiaStudio\Tinify\DI\Nette\TinifyExtension

tinify:	
    apiKey: my-secret-api-key
```

Presenter / Model / Service / ... 
```php
use TroiaStudio\Tinify\Tinify;

class UploadService
{
    private $tinify;
    
    public function __construct(Tinify $tinify)
    {
        $this->tinify = $tinify;
    }
    
    public function doResize()
    {
        ...
        $this->tinify->optimize($file)->toFile($optimizeFile);
        ...
    }
}
```
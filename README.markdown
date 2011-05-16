A Symfony bundle that acts as a configuration layer for the sluggable extension
of [Guilherme Blanco][1].

Installation
============
 1. Download the [Sluggable][2] extension to `vendor/doctrine-sluggable-extension`.
 2. Add both the extension and the bundle to the autoloader:
    
    ```php
    <?php
    // add the extension source to your autoload.php
    $loader->registerNamespaces(array('DoctrineExtensions\\Sluggable'               => __DIR__ . '/../vendor/doctrine-sluggable-functional-behavior/lib'
                                     ,'DoctrineExtensions\\Bundle\\SluggableBundle' => __DIR__ . '/../vendor/bundles/DoctrineExtensions/Bundle'
                                     ));
    ```
    
 3. Register your bundle in the kernel:
    
    ```php
    <?php
    // add this to your
    public function registerBundles ()
    {
      return array(// all the framework bundles
                  ,new DoctrineExtensions\Bundle\SluggableBundle\DoctrineExtensionsSluggableBundle
                  );
    }
    ```

Documentation
=============
Enabling the bundle should be sufficient for most default setups. If however you
wish to configure the extension further you should refer to the full (configuration)
[documentation][3] distributed with this bundle.

License
=======
The bundle is released under the MIT license. For more information see the
[license][4] file distibuted with this bundle.

[1]: https://github.com/guilhermeblanco
[2]: https://github.com/guilhermeblanco/Doctrine2-Sluggable-Functional-Behavior
[3]: https://github.com/marijn/DoctrineExtensionsSluggableBundle/blob/develop/Resources/doc/index.rst
[4]: https://github.com/marijn/DoctrineExtensionsSluggableBundle/blob/develop/Resources/meta/LICENSE
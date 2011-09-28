<?php

  namespace DoctrineExtensions\Bundle\SluggableBundle\DependencyInjection;

  use Symfony\Component\Config\FileLocator
    , Symfony\Component\Config\Definition\Processor
    , Symfony\Component\Config\Definition\Builder\TreeBuilder
    , Symfony\Component\DependencyInjection\Loader\XmlFileLoader
    , Symfony\Component\DependencyInjection\ContainerBuilder
    , Symfony\Component\HttpKernel\DependencyInjection\Extension;

  /**
   * DoctrineExtensionsSluggableBundle.
   *
   * @author  Marijn Huizendveld <marijn.huizendveld@gmail.com>
   */
  class DoctrineExtensionsSluggableExtension extends Extension
  {

    /**
     * {@inheritDoc}
     */
    public function load (array $configs, ContainerBuilder $container)
    {
      $processor = new Processor();

      $config = $processor->process($this->generateConfigTree(new TreeBuilder), $configs);

      $loader = new XmlFileLoader($container, new FileLocator(array(__DIR__ . '/../Resources/config')));

      $loader->load('sluggable.xml');

      $container->setParameter('sluggable.subscriber.class', $config['subscriber_class']);
      $container->setParameter('sluggable.entity_manager', $config['entity_manager']);
    }

    /**
     * Generates the configuration tree.
     *
     * @return Symfony\Component\Config\Definition\NodeInterface
     */
    public function generateConfigTree (TreeBuilder $arg_builder)
    {
      $arg_builder->root('doctrine_extensions_sluggable')
                    ->children()
                      ->scalarNode('subscriber_class')->defaultValue('DoctrineExtensions\\Sluggable\\SluggableSubscriber')->cannotBeEmpty()->end()
                      ->scalarNode('entity_manager')->defaultValue('default')->cannotBeEmpty()->end()
                    ->end()
                  ->end();

      return $arg_builder->buildTree();
    }

  }
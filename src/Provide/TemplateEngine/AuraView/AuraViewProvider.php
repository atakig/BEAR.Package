<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Provide\TemplateEngine\AuraView;

use BEAR\Sunday\Inject\LibDirInject;
use BEAR\Sunday\Inject\TmpDirInject;


use Aura\View\Template;
use Aura\View\EscaperFactory;
use Aura\View\TemplateFinder;
use Aura\View\HelperLocator;


use Ray\Di\ProviderInterface as Provide;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Twig
 *
 * @see http://twig.sensiolabs.org/
 */
class AuraViewProvider implements Provide
{
    use TmpDirInject;
    use LibDirInject;

    /**
     * Return instance
     *
     * @return Template
     */
    public function get()
    {
        $template = new Template(
            new EscaperFactory,
            new TemplateFinder,
            new HelperLocator
        );

        return $template;
    }
}

<?php


namespace Ourframework\Core;

/*
 * Base class for all user controllers.
 * It will be responsible for executing action in controller and catch status of this action
 * For now we using here template method with abstract method index.
 *  In later versions there won't be anything to override in user controllers
 */
abstract class Controller
{

    final public function __construct()
    {
    }

    public function execute(Request $request)
    {
        $status = $this->index($request);
        $request->setStatus($status);
    }

    // Rendering template
    protected function render(string $template=null, array $parr=[])
    {
        $reg = Register::instance();
        $settings = $reg->getSettingsManager()->getSettings();
        dump($settings);
        $engine = $settings["template"]["engine"][0];
        var_dump($settings["core"]["template_path"]);
        if ($engine == "twig") {
            $loader = new \Twig\Loader\FilesystemLoader($settings["core"]["template_path"]);
            $twig = new \Twig\Environment($loader);
            echo $twig->render($template, $parr); // TODO: return string
        }
        else if ($engine == "blade"){
            // TODO: For beloved Filip

            $views = __DIR__ . '/views'; // it uses the folder /views to read the templates
            $cache = __DIR__ . '/cache'; // it uses the folder /cache to compile the result.
            $blade=new bladeone\BladeOne(__DIR__.'/views',__DIR__.'/compiles');
            echo $blade->render($template, $parr); // TODO: return string
        }
        else {
            $loader = $settings["core"]["template_path"];
            $te = new TemplateEngine($loader);
            echo $te->render($template, $parr);
        }
    }

    abstract public function index(Request $request);
}

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

    protected function render(string $template=null, array $parr=[])
    {


        if(file_exists($template))
        {
            extract($parr);//zmienić
            $vs = new ViewSupport();//wazne zeby vs byl po extrakcie
            ob_start();
            include $template;
            $output = ob_get_clean();
        }
        print $output;
        return 1;
    }

    abstract public function index(Request $request): int;
}

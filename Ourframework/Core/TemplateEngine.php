<?php


namespace Ourframework\Core;


class TemplateEngine implements Interfaces\Renderable
{

    public function render(string $template = null, array $parr = [])
    {
        if(file_exists($template))
        {
            //if any variable named the same as the key exist <=> extract return number != sizeof($parr), then fail
            if (extract($parr, EXTR_SKIP) != sizeof($parr))
                return 1; //fail
            $vs = new ViewSupport();  //important $vs after extract
            ob_start();
            include $template;
            $output = ob_get_clean();
            print $output;
            return 0; //success
        } else
            return 1; //fail
    }
}
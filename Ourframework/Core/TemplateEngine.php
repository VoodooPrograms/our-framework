<?php


namespace Ourframework\Core;

class TemplateEngine implements Interfaces\Renderable
{
    protected $loader;

    public function __construct(string $loader = ""){
        $this->loader = $loader;
    }

    public function render(string $template = null, array $parr = []) : string
    {
        if(file_exists($this->loader.$template))
        {
            //if any variable named the same as the key exist <=> extract return number != sizeof($parr), then fail
            if (extract($parr, EXTR_SKIP) != sizeof($parr))
                return 1; //fail
            $vs = new ViewSupport();  //important $vs after extract
            ob_start();
            include $this->loader.$template;
            $output = ob_get_clean();
            //print $output;
            return $output; //success
        } else
            //throw new AppException("There is no template under path $this->loader.$template");
            return "There is no template under path:".$this->loader.$template; //fail
    }
}
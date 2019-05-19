<?php
/**
 * 
 */
class Router 
{

   Private Static $route_list;
    // Private Static $_URI;
    public static function GetUri(){
      $script_name = mb_strtolower($_SERVER['SCRIPT_NAME']);
      $request_uri = mb_strtolower($_SERVER['REQUEST_URI']);
      $y = preg_replace('/([a-z]*)\.(php)/','',$script_name);
      $y = str_replace("$y",'',$request_uri);
      $y = preg_replace('/\?(.*)/','',$y);
      $y = rtrim($y,'/');
      return  "/".$y;
    }
    
    public static function get($link,$data)
    {
      $dat = explode('@',$data);
      self::$route_list[$link] = [$dat[0],$dat[1]];
    }


    public static function RenderRoutes()
    {
      $uri =  " ".self::GetUri()." ";
      foreach (self::$route_list as $key => $value) {
        $k = preg_replace("/\{([^\}]*)\}/","([^/]*)",$key);
        $k = preg_replace("/\//","\/",$k);
        $t = preg_match("/ ".$k." /",$uri);
          if ($t) {
              $ContFile =  BASEPATH."/Controllers/".$value[0].'.php';
              if (is_file($ContFile)) {
                require $ContFile;
                $cls = new $value[0]($key);
                $meth =  $value[1];
                $call = call_user_func(array($cls,$meth));
              }else {
                echo "error!! $value[0] Controllers Not Found";
              }
          }
      }
  	}

}
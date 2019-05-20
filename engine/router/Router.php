<?php
/**
 * 
 */
class Router 
{

   Private Static $route_list;
   
   //  // Private Static $_URI;
   //  public static function GetUri(){
   //    $script_name = mb_strtolower($_SERVER['SCRIPT_NAME']);
   //    $request_uri = mb_strtolower($_SERVER['REQUEST_URI']);
   //    echo $request_uri;
   //    $y = preg_replace('/([a-z]*)\.(php)/','',$script_name);
   //    $y = str_replace("$y",'',$request_uri);
   //    $y = preg_replace('/\?(.*)/','',$y);
   //    $y = rtrim($y,'/');
   //    return  "/".$y;
   //  }
    
    public static function get($link,$data)
    {
      $dat = explode('@',$data);
      $link = rtrim($link,'/');
      self::$route_list[$link] = [$dat[0],$dat[1],'GET'];
    }

    public static function post($link,$data)
    {
      $dat = explode('@',$data);
      $link = rtrim($link,'/');
      self::$route_list[$link] = [$dat[0],$dat[1],'POST'];
    }

    public static function RenderRoutes()
    {

      $req = $_SERVER['REQUEST_URI'];
      $req = rtrim($req,'/');
      $req = preg_replace('/\?(.*)/','',$req);
      $request_uri = explode("/",$req);
      $req_uri ="";
      for ($i=3; $i < count($request_uri) ; $i++) { 
        $req_uri .= "/".$request_uri[$i];
      }

      $cont = self::$route_list[$req_uri];
      if($cont && $cont[2] == $_SERVER['REQUEST_METHOD']){
        require BASEPATH."/Controllers/".$cont[0].".php";
        $cls = new $cont[0]();
        $meth =  $cont[1];
        $call = call_user_func(array($cls,$meth));
      }else {
        echo "404 ERROR".$_SERVER['REQUEST_METHOD'];
      }
    }


   //  public static function RenderRoutes()
   //  {
   //    $uri =  " ".self::GetUri()." ";
   //    // echo $uri;
   //    foreach (self::$route_list as $key => $value) {
   //      $k = preg_replace("/\{([^\}]*)\}/","([^/]*)",$key);
   //      $k = preg_replace("/\//","\/",$k);
   //      $t = preg_match("/ ".$k." /",$uri);
   //        if ($t) {
   //            $ContFile =  BASEPATH."/Controllers/".$value[0].'.php';
   //            if (is_file($ContFile)) {
   //              require $ContFile;
   //              $cls = new $value[0]($key);
   //              $meth =  $value[1];
   //              $call = call_user_func(array($cls,$meth));
   //            }else {
   //              echo "error!! $value[0] Controllers Not Found";
   //            }
   //        }
   //    }
  	// }

}
<?php
/**
 * bsm templating engine core
 * @Author mochammad aria bishma fauzan 
 */
class BSM
{

	public function e($s)
	{
		echo htmlspecialchars($s);
	}

	

	public function sanitize($templ)
	{
	    $templ = preg_Replace('/\@if (.*)\:/','<?php if($1): ?>',$templ);
		$templ = preg_Replace('/\@else\:/','<?php else: ?>',$templ);
		$templ = preg_Replace('/\@endif/','<?php endif; ?>',$templ);
		$templ = preg_Replace('/\{\{([^{}]*)\}\}/','<?php $this->e($1) ?>',$templ);
		return $templ;
	}


	public function render_comp($value)
	{
		$file = file_get_contents(BASEPATH."/resource/components/_".$value.".bsm");
		$file = $this->sanitize($file);
		return $file;
	}

	public function Render($filename,$data)
	{
	    foreach ($data as $key => $value) {
	    	${$key} = $value;
	    }
			
		$templ = file_get_contents(BASEPATH."/resource/views/".$filename."_.bsm");

	    $templ = preg_Replace('/\@comp\(\"(.*)\"\)/','<?php eval("?>".$this->render_comp("$1")); ?>',$templ);
	    $templ = $this->sanitize($templ);

		eval('?>'.$templ);
		return $this;
	}
}
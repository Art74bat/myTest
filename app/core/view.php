<?php

class View
{
    function generate($content_view,$template_view,$paginate=null,$data=null,$count=null,)
    {	
		  include 'app/views/'.$template_view;
    }
}
<?php 
class View {
    public function Template($v_content,$v_template,$vars = array()) {
        foreach ($vars as $k=>$v) {
            $$k = $v;
        }
        //ob_start();
        include "views/$v_template";
        //return ob_get_clean();	
    }
}
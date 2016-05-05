<?php

class Api_Title extends PhalApi_Api {
    public function getRules() {
        return array(
            'main_title' => array(

            ),
            'footer_title' => array(

             )
        );
    }

    /**
     * main标题显示
     */
    public function main_title(){
        $domain = new Domain_Title();
        $info = $domain->main_title();
        return $info;
    }

    /**
     * footer标题显示
     */
    public function footer_title(){
        $domain = new Domain_Title();
        $info = $domain->footer_title();
        return $info;
    }
}

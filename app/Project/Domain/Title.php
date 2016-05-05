<?php

class Domain_Title {

    /**
     * main标题显示
     */
    public function main_title(){
        return DI()->notorm->app_title->where("t_state",0)->fetchAll();
    }

    /**
     * footer标题显示
     */
    public function footer_title(){
        return DI()->notorm->app_title->where("t_state",1)->fetchAll();
    }
}
<?php
    session_start();
    require '../vendor/autoload.php';
    require 'controllers/usersController.php';
    require 'controllers/managersController.php';

    $router = new AltoRouter();
   
    $router->map('GET',"/Keysaver/",function()
    {   
        unset($_SESSION['user_pseudo']);
        header('location:/Keysaver/homepage');
    });

    $router->map('GET',"/Keysaver/homepage",function()
    {   
        require 'view/home.php'; 
    });
    $router->map('POST',"/Keysaver/homepage",function()
    {   
        $msg="";
        $callController = new usersController();
        include 'functions/formcontrol.php';
        if (!empty($success)) {
            $loginCheck=$callController->checkLogin($pseudo,$password);
            if(!empty($loginCheck)){
                $_SESSION['user_pseudo'] = $pseudo;
                header('location:/Keysaver/dashboard');
            }
            else {
                $msg = "<p class='error'>Wrong pseudo or password, please try again...</p>";
            }
        }
        require 'view/home.php'; 
    });

    $router->map('GET',"/Keysaver/dashboard",function()
    {   
        if (!empty($_SESSION['user_pseudo'])) {
            $callController = new usersController();
            $getUser=$callController->getUserbyPseudo($_SESSION['user_pseudo']);
            if (!empty($getUser)) {
                $userData=$callController->getUserPassword($getUser->id);
                require 'view/user/dashboard.php';
                $_SESSION['keysaver_id'] = $getUser->id;
            }
            
        }
        else {
            header('location:/Keysaver/');
        }
        
    });
    $router->map('POST',"/Keysaver/dashboard",function()
    {   
        $searcherror = "";
        include 'functions/searclean.php';
        if(!empty($_SESSION['keysaver_id']))
        {
            if($success){
                    $callController = new managersController();
                    $searchData=$callController->searchData($_SESSION['keysaver_id'],$search);
                    require 'view/user/search.php';
                    die();
            }
            else {
                $searcherror = "<p>Aucune valeur entréé</p>";
            }
        }
        require 'view/user/dashboard.php';
    });
    

    $router->map('GET',"/Keysaver/add",function()
    {   
        if (!empty($_SESSION['user_pseudo'])) {
            require 'view/user/add.php';      
        }
        else {
            header('location:/Keysaver/dashboard');
        }
        
    });
    $router->map('POST',"/Keysaver/add",function()
    {   
        if (!empty($_SESSION['user_pseudo']) && !empty($_SESSION['keysaver_id'])) {
            $callController = new managersController();
            include 'functions/addformcontrol.php';
            if (!empty($success)) {
                $addData = $callController->addData($_SESSION['keysaver_id'],$account,$key,strtoupper($reference));
                if(!empty($addData)){
                    $msg = "<p class='success'>Data saved!<p/>";
                }
                else {
                    $msg = "<p class='error'>Sorry but we can't give respond to you request, please try again later...</p>";
                }
            }
            
            require 'view/user/add.php';      
        }
        else {
            header('location:/Keysaver/dashboard');
        }
        
    });

    $router->map('GET',"/Keysaver/delete/[*:slug]",function($slug)
    {   
        if (!empty($_SESSION['user_pseudo']) && !empty($_SESSION['keysaver_id'])){
            $slug=str_replace("-"," ",$slug);
            $callController = new managersController();
            $remove = $callController->removeData(urldecode($slug));
            if (!empty($remove)) {
                header('location:/Keysaver/dashboard');
            }
            else {
                $msg = "<p class='error'>Sorry but we can't give respond to you request, please try again later...</p>";
            }
        }
        
        require 'view/user/dashboard.php'; 
    });

    $router->map('GET',"/Keysaver/edit/[*:slug]",function($slug)
    {   
        if (!empty($_SESSION['user_pseudo']) && !empty($_SESSION['keysaver_id']) && !empty($slug)){
            $slug=str_replace("-"," ",$slug);
            $_SESSION['keysaver_ref'] = urldecode($slug);
            header('location:/Keysaver/edit');
        }
    });

    $router->map('GET',"/Keysaver/edit",function()
    {   
        if (!empty($_SESSION['user_pseudo']) && !empty($_SESSION['keysaver_id']) && !empty($_SESSION['keysaver_ref'])){
            $callController = new managersController();
            $getData = $callController->getDatabyReference($_SESSION['keysaver_ref']);
            require 'view/user/edit.php';
        }
    });
    $router->map('POST',"/Keysaver/edit",function()
    {   
        if (!empty($_SESSION['user_pseudo']) && !empty($_SESSION['keysaver_id']) && !empty($_SESSION['keysaver_ref'])){
            $callController = new managersController();
            include 'functions/addformcontrol.php';
            if (!empty($success)) {
                $updateData = $callController->updateData($account,$key,$reference,$_SESSION['keysaver_ref']);
                $_SESSION['keysaver_ref'] = $reference;
                if(!empty($updateData)){
                    $msg = "<p class='success'>Data saved!<p/>";
                }
                else {
                    $msg = "<p class='error'>Sorry but we can't give respond to you request, please try again later...</p>";
                }
            }
            $getData = $callController->getDatabyReference($_SESSION['keysaver_ref']);
            require 'view/user/edit.php';      
        }
        else {
            header('location:/Keysaver/');
        }
        
    });



    $match = $router->match();

    if( is_array($match) && is_callable( $match['target'] ) ) 
    {
        call_user_func_array( $match['target'], $match['params'] ); 
    } 
    else 
    {
    // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
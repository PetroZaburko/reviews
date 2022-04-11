<?php
$this->layout('view_head');

?>

<style type="text/css">

    body{
        background: #95A5A6;
    }
    h1{
        text-align: center;
        font-size: 190px;
        font-weight: 400;
        margin: 0;
    }
    .fa{
        font-size: 120px;
        text-align: center;
        display: block;
        padding-top: 100px;
        margin: 0 auto;
        color: #A93226;
    }
    #error p{
        text-align: center;
        font-size: 36px;
        color: #4A235A;
    }
    a.back{
        text-align: center;
        margin: 0 auto;
        display: block;
        text-decoration: none;
        font-size: 24px;
        background: #BA4A00;
        border-radius: 10px;
        width: 10%;
        padding: 4px;
        color: #fff;

    }
    footer p{
        padding-top: 160px;
        text-align: center;
    }
    a.w3hubs{
        text-decoration: none;
        color: #A93226;
    }
    @media(max-width: 550px){
        a.back{
            width: 20%;
        }
    }
    @media(max-width: 425px){
        h1{
            padding-top: 20px;
        }
        .fa{
            padding-top: 100px;
        }
    }
</style>
<section id="error">
    <div class="content">
        <i class="fa fa-warning"></i>
        <h1><?php echo $code ?></h1>
        <p><?php echo $message ?></p>
        <a class="back" href="/">Back</a>
    </div>
</section>
<footer>
    <p>© 2021 <?php echo $code ?> Error. All Rights Reserved</p>
</footer>


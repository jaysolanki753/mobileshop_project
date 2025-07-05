<?php

    echo "<br><br>sprintf()<br>";

    $str="Jay Solanki";
    $number=7;
    $weight=55.5;
    $height=170;
    $txt=sprintf("Hello, I am %s My luckey number is %u, my Weight and Height is %f and %d.",$str,$number,$weight,$height);
    echo $txt;

    echo "<br><br>ltrim()<br>";
    
    $strl="      Jay Solanki.";
    echo ltrim($strl);

    echo "<br><br>rtrim()<br>";

    $str1="Jay Solanki        .";
    echo "without rtrim: ".$str1;
    echo "<br>";
    echo "with rtrim: ".rtrim($str1);

    echo "<br><br>trim()<br>";

    $strt="      Jay Solanki.     ";
    echo ltrim($strt);

    echo "<br><br>str_pad()<br>";

    $str="Hello, Jay";
    echo str_pad($str,50,".");
    echo "<br><br>str_pad_left<br>";
    $str="Hello, Jay";
    echo str_pad($str,50,".",STR_PAD_LEFT);

    echo "<br><br>str_repeat()<br>";

    echo str_repeat("*",50);

    echo "<br><br>str_replace()<br>";

    $sen="we should daily eat pizza, sandwitch, burger and drink cocacola.";
    $bad_words=array('pizza','snadwich','burger','cocacola');
    $good_words=array('apple','banana','mango','coconut water');
    echo $sen,"<br>";
    $sen=str_replace($bad_words,$good_words,$sen);
    echo $sen;

    echo "<br><br>str_split()<br>";

    $alp=str_split("jaysolanki01234567");
    print_r($alp);

    echo "<br><br>strcmp()<br>";

    if(strcmp("jay","solanki")==0)
    {
        echo "both are same.";
    }
    else
    {
        echo "both are not same.";
    }

    echo "<br><br>strpos()<br>";

    echo strpos("Hello, Jay Solanki.","Jay");

    echo "<br><br>strlen()<br>";

    echo strlen("Hello, Jay Solanki.");

    echo "<br><br>strtolower()<br>";

    echo strtolower("HELLO, JAY SOLANKI.");

    echo "<br><br>strtoupper()<br>";

    echo strtoupper("hello, jay solanki.");

    echo "<br><br>ucwords()<br>";

    $name="hello, jay solanki.";
    echo ucwords($name);

    echo "<br><br>wordwrap()<br>";

    $text="The quick fox jumps, over the lazy dog.";
    $newtext=wordwrap($text,20,"<br>");
    echo $newtext;

    echo "<br><br>substr()<br>";

    echo substr('abcdef',1);
    echo "<br>";
    echo substr('abcdef',1,3);
    echo "<br>";
    echo substr('abcdef',-1,1);

    echo "<br><br>strstr()<br>";

    $email='jaysolanki@gmail.com';
    $domain=strstr($email,'s');
    echo $domain;

?>